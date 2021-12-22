# Verify installation:
<pre><code>docker</code></pre>
<pre><code>docker --version</code></pre>

# Show images
<pre><code>docker images</code></pre>
<pre><code>docker image ls</code></pre>

# Pull image
<pre><code>docker pull {imageName}</code></pre>
<pre><code>docker pull nginx:latest</code></pre>

# Run container from image
<pre><code>docker run nginx:latest</code></pre>

# Run container from image in detach mode
<pre><code>docker run -d nginx:latest</code></pre>
> -d flag for detach mode

# Run container from image in detach mode with ports mapping
ENTER_CODE</code></pre>
<pre><code>docker run -d -p 8080:80 nginx:latest</pre></code>
> -d flag for detach mode
> -p flag for mapping port from host-machine(8080) to container-port(80)

# Run container from image in detach mode with ports mapping and adding name
<pre><code>docker run --name myWebServer -d -p 8080:80 nginx:latest</pre></code>
> --name flag for nameing container
> -d flag for detach mode
> -p flag for mapping port from host-machine(8080) to container-port(80)

# Run container from image in detach mode with ports mapping, adding name and volumn
<pre><code>docker run --name myWebServer -v $(pwd):/usr/share/nginx/html -d -p 8080:80 nginx:latest</pre></code>
> --name flag for nameing container
> -v flag for sharing files and folder from host-machine into container using volumn.
> -d flag for detach mode
> -p flag for mapping port from host-machine(8080) to container-port(80)

# Map multiple ports
<pre><code>docker run -d -p 8080:80 -p 3000:80 nginx:latest</pre></code>

# List container
<pre><code>docker ps</pre></code>
- List all running and stopped containers
<pre><code>docker ps -a</pre></code>
- List all running and stopped containers with size
<pre><code>docker ps -as</pre></code>
- List all running and stopped containers IDs only
<pre><code>docker ps -aq</pre></code>

# Stop container
<pre><code>docker stop {containerID/containerNAME}</pre></code>

# Start again stopped container
<pre><code>docker start {containerID/containerNAME}</pre></code>

# Remove container
<pre><code>docker rm {containerID/containerNAME}</pre></code>

# Remove all stopped containers
<pre><code>docker rm $(docker ps -aq)</pre></code>

# Remove all stopped and running containers
<pre><code>docker rm -f $(docker ps -aq)</pre></code>

# Logged into container
<pre><code>docker exec --it containerNAME {bash OR /bin/sh}</pre></code>


# Share volumn data from containers bash
<pre><code>docker run --name myWebServer ---volumes-from {containerID/containerNAME} -d -p 8080:80 nginx:latest</pre></code>

# Build an image from Dockerfile
<pre><code>docker build --tag user-api-express:latest .</pre></code>

# Dockerfile
```

<!--- Use base image in FROM --->
FROM node:latest

<!--- Set working directory in order to run all commands from this directory --->
WORKDIR /app

<!--- Adding package.json and package-lock.json files here for using cache --->
ADD package*.json ./

<!--- Using cache here --->
RUN npm install

<!--- Copy soruce code from current directory into WORKDIR --->
ADD . .

<!--- Run cmd command --->
CMD node index.js

```

# Docker ignore file (.dockerignore)
```

node_modules
Dockerfile
.git

```


# Tagging and versioning images
<pre><code>docker build -t ${IMAGE}:${VERSION} .</pre></code>

# Pointing specific version to latest
<pre><code>docker tag ${IMAGE}:${VERSION} ${IMAGE}:latest</pre></code>

# Remove untagged images if you rebuilt the same version with
<pre><code>docker rmi $(docker images | grep "^<none>" | awk "{print $3}")</pre></code>

### OR
<pre><code>docker rmi $(docker images | grep "^<none>" | tr -s " " | cut -d' ' -f3 | tr '\n' ' ')</pre></code>

# Clean up commands introduced in Docker 1.13
<pre><code>docker system prune</pre></code>

### OR Individually
```
docker container prune
docker image prune
docker network prune
docker volume prune
```

# Container debugging
<pre><code>docker inspect {containerID/containerNAME}</pre></code>

# Container logs
<pre><code>docker logs {containerID/containerNAME}</pre></code>

















