# WP CLI:

## Create project directory:
<pre><code>mkdir new-project-folder</code></pre>

## Download WordPress
<pre><code>wp core download --path=.</code></pre>

## Create Config File:
<pre><code>wp config create --dbuser=root --dbpass=password  --dbname=DB_NAME</code></pre>

## Create DB:
<pre><code>wp db create</code></pre>

## Setup WP:
<pre><code>wp core install --admin_user=admin --admin_password=password --admin_email=aligcs324@gmail.com --url="PROJECT_URL" --title="PROJECT_NAME” </code></pre>

## Creat SSL Self Signed Certificate:
<pre><code>mkcert -key-file PROJECT_NAME.key -cert-file PROJECT_NAME.pem  PROJECT_URL</code></pre>

