# WI Starter FSE

Starting point for WordPress FSE themes development.
Intended to be used with VSCode and Dev Containers.

## Setup

1. Copy `.env.sample` to `.env` and adjust as needed.

2. Run `./setup.sh` to replace name/slug/namespace used by template with your own.
   Remember to escape backslashes in `$THEME_NAMESPACE`!

## Development

```sh
docker compose -f docker-compose.yaml up -d --build
```

The whole development should be done inside the container.
To connect to the container use Attach Visual Studio Code context menu option.
Open `/usr/local/app` folder.
Inside, run in the Terminal (or Run Task...)

```sh
yarn start
```

**Important:** The browser preview is available via your local WordPress URL.
