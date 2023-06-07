# Extending https://github.com/devcontainers/images/blob/main/src/php
FROM "mcr.microsoft.com/devcontainers/php:0-8.1"

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

# Add php intl extension
RUN install-php-extensions intl
