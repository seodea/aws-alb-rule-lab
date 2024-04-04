#!/bin/bash

cp -f was/httpd.conf /etc/httpd/conf/httpd.conf
cp was/VirtualHost.conf /etc/httpd/conf.d
mv was/networklab/ /var/www/html/
