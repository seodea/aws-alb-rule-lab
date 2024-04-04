#!/bin/bash

pattern="^[a-zA-Z]+(\.[a-zA-Z]+)+$"

while true; do
    # Prompt the user to enter a domain address
    read -p "Enter a domain address: " domain

    if [[ $domain =~ $pattern ]]; then
        echo "Domain address is valid."
        break
    else
        echo "Invalid domain address. It should contain only alphabets separated by a single dot."
    fi
done

word_to_replace="{domain}"

sed -i "s/$word_to_replace/$domain/g" networklab/web-8080/index.php
sed -i "s/$word_to_replace/$domain/g" networklab/web-8080/contact.php
sed -i "s/$word_to_replace/$domain/g" networklab/web-8080/display_guestbook.php