#!/bin/bash

if [ $(whoami) != "root" ]; then
    echo "Must run as root user"
    exit;
fi

sudo rm /etc/apache2/sites-available/auth.pi.idevcode.com.conf
sudo rm /etc/apache2/sites-enabled/auth.pi.idevcode.com.conf
sudo ln -s /home/jtodd/auth-server /devops/auth.pi.idevcode.com.conf /etc/apache2/sites-available/auth.pi.idevcode.com.conf
sudo ln -s /etc/apache2/sites-available/auth.pi.idevcode.com.conf /etc/apache2/sites-enabled/auth.pi.idevcode.com.conf
sudo service apache2 restart
