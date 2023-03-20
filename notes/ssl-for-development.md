# SSL certificate for development

<pre><code>mkcert -key-file KEY_FILE_NAME.key -cert-file CERTIFICATE_FILE_NAME.pem  WEBSITE_BASE_URL</pre></code>

e.g:

> mkcert -key-file APP_NAME_HERE.key -cert-file APP_NAME_HERE.pem  app.APP_NAME_HERE.me

## VirtualHost Settings:

<pre><code>

<VirtualHost *:443>
    
    ServerName app.APP_NAME_HERE.me
    ServerAlias www.app.APP_NAME_HERE.me

    ServerAdmin contactme.aliraza@gmail.com
    
    ErrorLog "/Sites/APP_NAME_HERE/apache_errors.log"
    CustomLog "/Sites/APP_NAME_HERE/custom.log" common

    SSLEngine on
    SSLCertificateFile "/Sites/APP_NAME_HERE/APP_NAME_HERE.pem"
    SSLCertificateKeyFile "/Sites/APP_NAME_HERE/APP_NAME_HERE.key"

    DocumentRoot "/Sites/APP_NAME_HERE"

    <Directory "/Sites/APP_NAME_HERE">

            Options Indexes FollowSymLinks
            AllowOverride All
            Order allow,deny
            Allow from all

    </Directory>
    
</VirtualHost>

<pre><code>