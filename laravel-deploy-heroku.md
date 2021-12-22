<pre><code>HERECOMMAND</code></pre>

How to deploy a Laravel/Vue App to Heroku

In this article, I will be showing you how to deploy a Laravel/Vue application to Heroku; a container-based cloud Platform as a Service (PaaS), which developers use to deploy, manage and scale modern apps.

Prerequisites:

• PHP and Laravel Knowledge 
• Heroku User Account
• Heroku CLI (Download here)
• Git (get git here)

This article assumes that you have an existing Laravel/Vue application on your local server which is ready for deployment

# Step 1: Initialize a git
Initialize a git repository in your current working project directory with git init command

# Step 2: Create a Procfile
In your project directory create a Procfile without an extension and add this line <pre><code>web: vendor/bin/heroku-php-apache2 public/</code></pre> The Procfile can also be created and updated through the terminal, to do this, run <pre><code>echo "web: vendor/bin/heroku-php-apache2 public/"</code></pre> Procfile command on your terminal

# Step 3: Create a new application on Heroku
In other to create a new application on Heroku where you can push your application to, use the  command.<pre><code>heroku create</code></pre> When this is done a random name will be automatically chosen for your application. To change this name use  command.<pre><code>heroku apps:rename newAppName</code></pre> Replace “newAppName” with your preferred new name.

# Step 4: Enable node.js 
You need to enable node.js in other to run commands like npm install and npm production. To do this you need to add heroku/nodejs build pack using heroku buildpacks:add heroku/nodejs command. With this, the node dependencies in your package.json file will be installed on deployment but it won’t install any of your devDependencies. To solve this you need to set an environment variable to tell Heroku to install all dependencies including devDependencies using <pre><code>heroku config:set NPM_CONFIG_PRODUCTION=false</code></pre> command then add postinstall in package.json scripts

```
"scripts": {
    "postinstall": "npm run prod"
}
```

# Step 5: Setup a Laravel encryption key
To set up your Laravel encryption key copy the APP_KEY environment value from your .env file and run heroku config:set APP_KEY=”Your app key” or you can generate a new one and set it as your new key using heroku config:set APP_KEY=$(php artisan --no-ansi key:generate --show) command.

# Step 6: Push to Heroku
Commit the current state of your application with git and push to Heroku with git push heroku master

# Step 7: Ensure that your application is using the right Heroku buildpacks
You need to ensure that your application is using the right buildpacks. To do this run the heroku buildpacks command. If you have heroku/php and heroku/nodejs listed you are good to go.

If you can’t find any, run heroku buildpacks:add [‘missing build’] command, replace the [‘missing build’] with the buildpack you wish to install and push to Heroku.

# Step 8: Your app should be up and running. To view it, navigate to the address in your browser

To set the environment variables for your application you can do that using your terminal with the heroku config:set VAR_NAME=VAR_VALUE command or through your dashboard in the settings tab, click on Reveal config vars to see and set environment variables.

Heroku provides you the option to use postgres sql free. To use this run the command:

heroku addons:create heroku-postgresql:hobby-dev

Set DB_CONNECTION to pgsql through your dashboard in the settings tab, click on Reveal config vars to see environment variable.

To get DB credentials for your application click on the 
Heroku Postgres Hobby Dev installed addon on the overview tab on your dashboard, this will open a new browser tab. The DB credentials can be found through the settings tab of the new browser tab.

Note:To run your regular artisan or npm commands on heroku, precede all statements with heroku run e.g. heroku run php artisan storage:link or heroku run npm install