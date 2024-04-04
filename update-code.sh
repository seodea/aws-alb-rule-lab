#!/bin/bash

pattern="^[a-zA-Z]+(\.[a-zA-Z]+)+$"

if [[ $1 =~ $pattern ]]; then
    echo "Domain address is valid."
    echo "Updating a domain name in web server"
else
    echo "Invalid domain address. It should contain only alphabets separated by a single dot."
    exit 1
fi


word_to_replace="{domain}"

sed -i "s/$word_to_replace/$1/g" networklab/web-8080/index.php
sed -i "s/$word_to_replace/$1/g" networklab/web-8080/contact.php
sed -i "s/$word_to_replace/$1/g" networklab/web-8080/display_guestbook.php

echo "Finish update the code"
echo "################"
echo "## GOOD LUCK ###"
echo "################"