#!/bin/bash

cp -f was/httpd.conf /etc/httpd/conf/httpd.conf
cp was/VirtualHost.conf /etc/httpd/conf.d
mv was/networklab/ /var/www/html/

chown ec2-user:ec2-user -R /var/www/html/networklab/
chown apache:apache -R /var/www/html/networklab/was-guestbook/guestbook.txt
