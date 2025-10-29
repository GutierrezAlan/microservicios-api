#!/bin/bash

# Crear enlaces simbólicos si los archivos existen
if [ -f /workspaces/microservicios-api/mainsync.sh ]; then
    ln -sf /workspaces/microservicios-api/mainsync.sh /usr/local/bin/mainsync
    chmod +x /workspaces/microservicios-api/mainsync.sh
fi

if [ -f /workspaces/microservicios-api/migrate.sh ]; then
    ln -sf /workspaces/microservicios-api/migrate.sh /usr/local/bin/migrate
    chmod +x /workspaces/microservicios-api/migrate.sh
fi
if [ -f /workspaces/microservicios-api/start.sh ]; then
    ln -sf /workspaces/microservicios-api/start.sh /usr/local/bin/start
    chmod +x /workspaces/microservicios-api/start.sh
fi