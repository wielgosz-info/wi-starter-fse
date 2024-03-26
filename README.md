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

2. Prepare dockers:

    ```sh
    docker compose --profile cli -f docker-compose.yaml up -d --build
    ```

Next steps require you to be in CLI container shell (in `/var/www/html`).
The simplest way is via "Attach Shell" VSCode context option 😉.

3. [Optional] Import test data:

    ```sh
    wp plugin install wordpress-importer --activate
    wget -O /tmp/themeunittestdata.wordpress.xml https://raw.githubusercontent.com/WordPress/theme-test-data/master/themeunittestdata.wordpress.xml
    wp import /tmp/themeunittestdata.wordpress.xml --authors=create
    rm /tmp/themeunittestdata.wordpress.xml
    ```

4. [Optional] Install helper plugins. Hint: they are already in `.gitignore`.

    ```sh
    wp plugin install query-monitor --activate
    wp plugin install wp-mail-logging --activate
    wp plugin install theme-check --activate
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
