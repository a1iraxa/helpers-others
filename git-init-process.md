
## Create empty repository:
<pre><code>CONTENT_HERE</code></pre>

# Initialize repository
<pre><code>git init</code></pre>

# Check changes:
<pre><code>git status</code></pre>

# Add all changes and files:
<pre><code>git add .</code></pre>

# Commit all files and changes:
<pre><code>git commit -m 'Initial commit'</code></pre>

# Create new repository on github account and copy clone path/url:
## Now add new remote origin:
<pre><code>git remote add origin "clone_url_without_qoutes"</code></pre>

# Check remote origin congif:
<pre><code>git remote -v </code></pre>

# Set upstream-branch:
<pre><code>git push --set-upstream origin master</code></pre>
<pre><code>git branch --set-upstream-to=origin/master</code></pre>

# Now pull from repository:
<pre><code>git pull </code></pre>
### OR
<pre><code>git pull --allow-unrelated-histories</code></pre>

<pre><code>Type ":q" and hit enter</code></pre>

# Now push repository:
<pre><code>git push</code></pre>

## Create and manage branch:

# Create new branch:
<pre><code>git branch "branch_name_without_qoutes"</code></pre>

# Show all branches:
<pre><code>git branch --list</code></pre>
### OR
<pre><code>git branch</code></pre>

# Changing branch:
<pre><code>git checkout "branch_name_to_switch_without_qoutes" </code></pre>

# Create new branch and switch directly newly created branch:
<pre><code>git checkout -b "branch_name_without_qoutes"</code></pre>

# First time push changes into newly created branch:
<pre><code>git push --set-upstream origin "branch_name_without_qoutes"</code></pre>



## Merge branch:

# Switch to branch on which you want to merge:
<pre><code>git checkout "branch_name_to_switch_without_qoutes"  // eg: git checkout master</code></pre>

# git merge "branch_name_to_merge_without_qoutes" // eg: git merge alpha
<pre><code>Type ":q" and hit enter</code></pre>
# Now commit and push to current branch

## Delete branch:

<pre><code>git branch -d "branch_name_without_qoutes" // This will delete only local not remote</code></pre>

<pre><code>git push origin :"deleted_branch_name_without_qoutes"</code></pre>


https://www.youtube.com/playlist?list=PL-osiE80TeTuRUfjRe54Eea17-YfnOOAx

