<pre><code>HERECOMMAND</code></pre>

# Open file
<pre><code>vim {file_name}</code></pre>
<pre><code>vim +25 {file_name} open-file-and-go-to-line-number</code></pre>

# Set line number
<pre><code>:set number</code></pre>

# Set syntax
<pre><code>:syntax on</code></pre>

# Quit file without saving
<pre><code>:q!</code></pre>

# Navigation
<pre><code>k up</code></pre>
<pre><code>j down</code></pre>
<pre><code>l left</code></pre>
<pre><code>h right</code></pre>
<pre><code>w next-word</code></pre>
<pre><code>b previous-word</code></pre>
<pre><code>0 begging-of-line</code></pre>
<pre><code>$ end-of-line</code></pre>
<pre><code>^ begging-of-line-after-space</code></pre>
<pre><code>gg begging-of-file</code></pre>
<pre><code>G end-of-file</code></pre>

<pre><code>[ block-to-block</code></pre>
<pre><code>] block-to-block</code></pre>

<pre><code>4gg go-to-line-4</code></pre>

# Insert mode
<pre><code>i enter-into-insert-mode</code></pre>
<pre><code>a enter-into-insert-mode-after-cursor</code></pre>
<pre><code>o enter-into-insert-mode-after-current-line</code></pre>
<pre><code>O enter-into-insert-mode-before-current-line</code></pre>

<pre><code>u undo-changes</code></pre>
<pre><code>ctrl+r redo-changes</code></pre>

<pre><code>dw delete-word</code></pre>
<pre><code>dd delete-line</code></pre>
<pre><code>5dd delete-5-lines</code></pre>
<pre><code>dG delete-full-file</code></pre>
<pre><code>db delete-previous-word</code></pre>
<pre><code>d0 delete-begging-of-line</code></pre>
<pre><code>d$ delete-end-of-line</code></pre>

<pre><code>p paste-content-from-d</code></pre>

# Search and replace
<pre><code>/search_word</code></pre>
<pre><code>n search-result-next-word</code></pre>
<pre><code>N search-result-previous-word</code></pre>
<pre><code>:%s/search_for/replace_with/gc g-for-global__c-for-confirmation</code></pre>
<pre><code>:%s/search_for/replace_with/g g-for-global</code></pre>

# Saving configurations (~/.vimrc)
<pre><code>:set number</code></pre>
<pre><code>:syntax on</code></pre>
