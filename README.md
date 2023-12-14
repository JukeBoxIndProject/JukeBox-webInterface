# Launch app by docker/docker-compose

```bash
systemctl start docker # Start docker app

systemctl --user start docker-desktop # **Optional** Start docker-desktop (for dev only, not prod)

sudo docker-compose up -d # Mount the docker-composer (" -d" for get detached of the container on the current terminal)

sudo docker exec -it vite_docker sh # Get into the docker container terminal

npm i && npm run dev # Start nodeJs app

```

# How to kill a used port on the computer if it is the same that one of container
```bash
lsof -i :80 | awk 'NR>1 {print $2}' | xargs kill
```

# Stop app

```bash
ctrl-c # Stop nodeJs app

exit # Exit the docker container terminal

sudo docker stop vite_docker # Stop the docker container

sudo docker rm vite_docker # Unmount the docker container
```

# How to access to mysql with terminal 
```bash
mysql -u root -p

Enter password = root
```
# Database with PHPMyAdmin
## Do not user the tables: failed_jobs, migrations, password_reset_tokens, personal_access_tokens and users !! 
### These tables are to make some backup of the modifications on the project database.

#### To have all tables in phpmyadmin and to make an update, you have to do the following command:
```bash
docker-compose exec laravel php artisan migrate
```

# For access to the Laravel server, you have to do the following command in the Laravel project
```bash
php artisan serve #It will launch the Laravel server
```

# Command to create a Controller, an Event and an EventListener
```bash
php artisan make:controller NameOfTheController

php artisan make:event NameOfTheEvent

php artisan make:listener NameOfTheListener --event=NameOfTheEvent

```

# Differents controllers/events and eventslisteners for the Laravel project
## For users
UserController: manage all users in the project
UserUpdated: Event who update users
UserUpdatedListener: event listener who update the file that contain the list of all users
