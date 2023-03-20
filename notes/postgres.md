## Login: 
<pre><code>psql -d postgres</pre></code>

## connect DB: 
<pre><code>\c databaseName</pre></code>

## List DBs:
<pre><code>\l</pre></code>

## Show users:
<pre><code>\du</pre></code>

## Show tables:
<pre><code>\dt</pre></code>
<pre><code>\dt+</pre></code>

## describe table
<pre><code>SELECT table_name, column_name, data_type FROM information_schema.columns WHERE table_name = 'TABLE_NAME_HERE';</pre></code>

## Create database
<pre><code>CREATE DATABASE laravel_investimento;</pre></code>

## Select from table
<pre><code>SELECT id, email, password FROM users;</pre></code>

## Update column:
<pre><code>update users set username = lower(username);</pre></code>

## delete table:
<pre><code>DROP TABLE TABLE_NAME;</pre></code>

## Quit:
<pre><code>\q</pre></code>
