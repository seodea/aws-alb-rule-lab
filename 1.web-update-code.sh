#!/bin/bash

pattern="^[a-zA-Z0-9]+(\.[a-zA-Z]+)+$"

if [[ $1 =~ $pattern ]]; then
    echo "Domain address is valid."
    echo "Updating a domain name in web server"
else
    echo "Invalid domain address. It should contain only alphabets separated by a single dot."
    exit 1
fi


word_to_replace="{domain}"

sed -i "s/$word_to_replace/$1/g" web/networklab/web-8080/index.php
sed -i "s/$word_to_replace/$1/g" web/networklab/web-8080/contact.php
sed -i "s/$word_to_replace/$1/g" web/networklab/web-8080/display_guestbook.php

echo "Finish update the code"

echo "Copy the httpd config file for test"

cp -f web/httpd.conf /etc/httpd/conf/httpd.conf 
cp web/VirtualHost.conf /etc/httpd/conf.d
mv web/networklab/ /var/www/html/

chown ec2-user:ec2-user -R /var/www/html/networklab/

echo "################"
echo "## GOOD LUCK ###"
echo "################"
