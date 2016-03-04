#!/bin/sh
if [ -z "$1" ]; then
    echo "no params"
    COUNT=1
else
    echo $1
    COUNT=$1
fi


COUNTER=0
while [  $COUNTER -lt $COUNT ]; do
    echo The counter is $COUNTER
    curl "http://loripsum.net/api/5/medium/decorate/link/ul/ol/dl/bq/code/headers/" | sed "s/<\/p>/<\/p>\<\!\-\-more\-\-\>/" | wp post generate --post_content --count=1 --post_author=$(wp user list --role=administrator --field=ID --format=json | sed "s/\[//" | sed "s/\]//" | sed "s/\,.*//")
    let COUNTER=COUNTER+1
done




