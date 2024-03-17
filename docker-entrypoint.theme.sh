#!/bin/sh

# This script is used to start the container. It is called by the Dockerfile
# it needs an access to the mounted volumes

git fetch
yarn install

exec "$@"
