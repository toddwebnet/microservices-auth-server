#!/usr/bin/env bash

[ -e ../../docker/nginx/sites/auth.dev.idevcode.com.conf ] && rm ../../docker/nginx/sites/auth.dev.idevcode.com.conf
cp ./auth.dev.idevcode.com.conf ../../docker/nginx/sites/auth.dev.idevcode.com.conf