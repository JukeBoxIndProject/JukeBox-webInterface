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

