#!/bin/sh -e

yes '' | pecl install -f apcu
echo "apc.enabled = 1" >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
echo "apc.enable_cli = 1" >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini
