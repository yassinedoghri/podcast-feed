# Extending https://github.com/devcontainers/images/blob/main/src/php
FROM "mcr.microsoft.com/devcontainers/php:0-8.1"

# Add php intl extension
RUN apt-get update \
    && apt-get install --yes --no-install-recommends libicu-dev \
    docker-php-ext-install intl
