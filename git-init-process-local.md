## Create directory for storing repo, it's conventional to give bare repositories the extension (.git)
mkdir directory_for_repo.git
cd directory_for_repo.git

# Run command (in the repo directory)
git init --bare

## Run the following commands in Porject Directory. e.g: wordpress/ plugin / laravel
git init
git remote add local /path_the_repo_directory/directory_for_repo.git

# Run these command for first commit
git add .
git commit -m "initial commit with Frontend" 

## Push to local repository
git push -u local HEAD | git push -u local main