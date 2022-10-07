#!/bin/bash

docker compose up -d 

docker exec app bash /var/www/setup.bash
