# WI Starter FSE

Starting point for WordPress FSE themes development.
Intended to be used with VSCode and Dev Containers.

# Setup

## Prepare proxy (only one is needed for all projects)

1. Create `proxy` network

```sh
docker network create proxy
```

2. Run proxy service:

```sh
docker compose -f docker-compose.proxy.yaml up -d --build
```

## Install WP & (optionally) theme test data & helper plugins

1. Copy `.env.sample` to `.env` and adjust as needed.
   Pay special attention to `$WP_VIRTUAL_HOST` - it needs to be unique for each project using the above proxy.
   Additionally, `$THEME_USE_TEST_DATA` can be set to true to import standard WP Theme test data from
   https://github.com/WordPress/theme-test-data/blob/master/themeunittestdata.wordpress.xml.

2. Add `THEME_SLUG` variable to your CI/CD setup (e.g., GitHub Actions).

3. Run `./setup.sh` to replace name/slug/namespace used by template with your own.
   Remember to escape backslashes in `$THEME_NAMESPACE`!

4. Prepare dockers:

    ```sh
    docker compose --profile cli -f docker-compose.yaml up -d --build
    ```

# Development

```sh
docker compose -f docker-compose.yaml up -d --build
```

The whole development should be done inside the container.
To connect to the container use Attach Visual Studio Code context menu option.
Inside, run in the Terminal (or Run Task...)

```sh
yarn dev
```

**Important:** The browser preview is available via URL specified in `$WP_VIRTUAL_HOST`. The Vite server only serves asset files.
