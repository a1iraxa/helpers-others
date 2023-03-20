## Copy from one DB to another in Heroku:
heroku pg:copy SOURCE_APP_NAME::source_database_name target_database_name --app TARGET_APP_NAME


## Copy DB from production to stating:
heroku pg:copy APP_NAME_HERE::HEROKU_POSTGRESQL_BROWN_URL DATABASE_URL --app APP_NAME_HERE-staging


# Import Prod DB to Local:

## 1. Create Backup:
heroku pg:backups capture --app APP_NAME_HERE

## 2. Download latest backup
heroku pg:backups:download --app APP_NAME_HERE

## 3. Import into local DB
pg_restore --verbose --clean --no-acl --no-owner -h localhost -U LOCAL_DB_USERNAME -d LOCAL_DB_NAME latest.dump

