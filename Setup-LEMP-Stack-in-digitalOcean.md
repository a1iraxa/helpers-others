# Setup LEMP Stack in digitalOcean:

## Login into Server via SSH

ssh root@IP_ADDRESS

# Add SSH key and add new user

## Generate ssh key
ssh-keygen -t rsa -b 4096 -C "domain_provider" -f "id_rsa_domain"

## Copy .pub key
cat id_rsa_domain.pub | pbcopy

## Add into server (go to .ssh directory)
vim authorized_keys

### Paste copied key from clipboard

## Connect via SSH
SSH -i .ssh/id_rsa_domain root@IP_ADDRESS


# Add new user into Ubuntu server
adduser NEW_USER_NAME

## Change user
sudo su NEW_USER_NAME

## Exit from normal user
exit

## Add new user into admin group
usermod -aG admin USER_NAME

## Add ssh key for new user (go to root-directory)
mkdir .ssh (if no directory exists)
cd .ssh
vi authorized_keys

## Login as new user via SSH
SSH -i .ssh/id_rsa_domain user_name@IP_ADDRESS

## Restrict login via password and root user
sudo vi /etc/ssh/ssh_config

### search 'PermitRootLogin yes' replace with 'PermitRootLogin no'
### search 'PasswordAuthentication yes' replace with 'PasswordAuthentication no'

## Restart service after making any kind of change
sudo service ssh restart

# Install php, nginx, mysql, git

sudo apt-get update

### Search for unbuntu php version
sudo apt-cache search php
php -v
which php

## Install latest php
sudo apt-get php7.2-cli
#### Add repository
sudo add-apt-repository ppa:ondrej/php

sudo apt-get update

sudo add-apt-repository ppa:nilarimogard/webupd8

sudo apt-get update

sudo apt-get install launchpad-getkeys

sudo launchpad-getkeys

sudo apt-get update 

sudo apt-cache search php

## Install php
sudo apt-get install -y php7.4-cli php7.4-fpm php7.4-mbstring php7.4-mysql php7.4-mysql php7.4-curl php7.4-mcrypt

## Install MYSQL
sudo apt-get install mysql-server

## Install NGINX
sudo apt-get install nginx

## Install GIT
sudo apt-get install git

## Install ZIP/UNZIP
sudo apt-get install zip unzip


# Setting up git and github
## Generate ssh key
ssh-keygen -t rsa -b 4096 -C "github_anything" -f "id_rsa_github"

## Copy .pub key
cat id_rsa_github.pub | pbcopy

## Add into github
-- Settings
	- Deploy keys
	- Add deploy key
	
# Check github on server
ssh -T git@githib.com

# Install Composer
curl -sS https://getComposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

## Check composer
composer

## Install composer dependencies
composer install --no-dev

## Setup .env file
cp .env-example .env

## Generate key
php artisan key:generate

# Setup nginx
cd /etc/nginx
sudo vim sites-available
sudo vim sites-available/default

## For laravel public folder update (/var/www/html) to (/var/www/html/public)
root /var/www/html/public

index index.html index.htm index.php (remove: index.nginx-debian.html)
Replace:

try_files $uri $uri/ =404 
with: 
try_files $uri $uri/ /index.php$is_args$args

## Uncomment following section
location ~ \.php${
	include snippets/fastcgi-php.conf
	fastcgi_pass unix:/run/php/php7.4-fpm.sock;
}

### Add project into ( /var/www/html )



# Check ngnix config and Restart, reload ngnix service
ngnix -t
sudo service nginx restart
sudo service nginx relaoad

# Update laravel storage directory permissions
sudo chmod -R 777 /var/www/html/storage


# Setup mysql and create database in Laravel APP
mysql -u root -p
SHOW DATABASES;
CREATE DATABASE db_name;

## Update DB credentials in .env

sudo vim /var/www/html/.env

# Connect server DB locally through SSH
MYSQL Host: IP_address
Username: db_username
Password: db_password
Database: db_password
Post: 3306

SSH Host: Server_IP
SSH User: Server_User (e.g: root)
SSH Key: Private_Key
SSH Port: 22





























