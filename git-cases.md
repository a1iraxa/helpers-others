*Expanding what I wrote in a comment*

The general rule is that you should not rewrite (change) history that you have published, because somebody might have based their work on it.  If you rewrite (change) history, you would make problems with merging their changes and with updating for them.

So the solution is to create a *new commit* which **reverts changes** that you want to get rid of.  You can do this using [git revert][git-revert] command.

You have the following situation:
<pre>
A &lt;-- B  &lt;-- C &lt;-- D                                  &lt;-- master &lt;-- HEAD
</pre>
(arrows here refers to the direction of the pointer: the "parent" reference in the case of commits, the top commit in the case of branch head (branch ref), and the name of branch in the case of HEAD reference).

What you need to create is the following:
<pre>
A &lt;-- B  &lt;-- C &lt;-- D &lt;-- [(BCD)<sup>-1</sup>]                   &lt;-- master &lt;-- HEAD
</pre>
where `[(BCD)^-1]` means the commit that reverts changes in commits B, C, D.  Mathematics tells us that (BCD)<sup>-1</sup> = D<sup>-1</sup> C<sup>-1</sup> B<sup>-1</sup>, so you can get the required situation using the following commands:

    $ git revert --no-commit D
    $ git revert --no-commit C
    $ git revert --no-commit B
    $ git commit -m "the commit message for all of them"

Works for everything except merge commits.

----

Alternate solution would be to [checkout][git-checkout] *contents* of commit A, and commit this state.  Also works with merge commits.  Added files will not be deleted, however.  If you have any local changes `git stash` them first:

    $ git checkout -f A -- . # checkout that revision over the top of local files
    $ git commit -a

Then you would have the following situation:
<pre>
A &lt;-- B  &lt;-- C &lt;-- D &lt;-- A'                       &lt;-- master &lt;-- HEAD
</pre>
The commit A' has the same contents as commit A, but is a different commit (commit message, parents, commit date).

----

Alternate [solution by Jeff Ferland, modified by Charles Bailey](https://stackoverflow.com/questions/1463340/revert-multiple-git-commits/1463390#comment1312779_1463390) builds upon the same idea, but uses [git reset][git-reset].  Here it is slightly modified, this way WORKS FOR EVERYTHING:

    $ git reset --hard A
    $ git reset --soft D # (or ORIG_HEAD or @{1} [previous location of HEAD]), all of which are D
    $ git commit

 [git-revert]: http://www.kernel.org/pub/software/scm/git/docs/git-revert.html  "git-revert(1) Manual Page - Revert an existing commit"
 [git-checkout]: http://git-scm.com/docs/git-checkout "git-checkout(1) Manual Page - Checkout a branch or paths to the working tree"
[git-reset]: https://www.kernel.org/pub/software/scm/git/docs/git-reset.html "git-reset(1) Manual Page - Reset current HEAD to the specified state"

==============================

Assuming that your branch is called `master` both here and remotely, and that your remote is called `origin` you could do:

     git reset --hard <commit-hash>
     git push -f origin master

However, you should avoid doing this if anyone else is working with your remote repository and has pulled your changes.  In that case, it would be better to [revert](http://www.kernel.org/pub/software/scm/git/docs/git-revert.html) the commits that you don't want, then push as normal.

**Update:** you've explained below that other people have pulled the changes that you've pushed, so it's **better to create a new commit that reverts all of those changes**.  There's a nice explanation of your options for doing this in [**this answer from Jakub Narębski**](https://stackoverflow.com/questions/1463340/revert-multiple-git-commits/1470452#1470452).  Which one is most convenient depends on how many commits you want to revert, and which method makes most sense to you.

Since from your question it's clear that you have already used `git reset --hard` to reset your `master` branch, you may need to start by using `git reset --hard ORIG_HEAD` to move your branch back to where it was before.  (As always with `git reset --hard`, make sure that `git status` is clean, that you're on the right branch and that you're aware of `git reflog` as a tool to recover apparently lost commits.)  You should also check that `ORIG_HEAD` points to the right commit, with `git show ORIG_HEAD`.

**Troubleshooting:**

If you get a message like "*! [remote rejected]   a60f7d85 -> master (pre-receive hook declined)*" 

then you have to allow branch history rewriting for the specific branch. In BitBucket for example it said "Rewriting branch history is not allowed". There is a checkbox named `Allow rewriting branch history` which you have to check.