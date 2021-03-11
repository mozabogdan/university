# university

# Installation steps
## Clone repository inside workspace
* git clone git@github.com:mozabogdan/university.git;
## Run following commaind inside university/
* docker-compose up -d;
## Connect to Docker container
* docker exec -it {ImageId} bash;
# Change directory to app/
* cd app;
# Run composer install
* composer install;
# Run database migrations
* bin/console doctrine:migrations:migrate
## After composer is done installing and the database is migrated, access the url 
* http://localhost:8081/admin

## to connect to the Database locally you can use:
host: 127.0.0.1
port: 3306
user: app
password: 123456
