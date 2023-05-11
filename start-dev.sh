#!/bin/bash
docker compose up --build -d
docker compose exec -t app composer install