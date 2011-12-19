#!/bin/bash
FILES=$PWD/*.json

# Show usage banner if there aren't enough arguments
if [ $# -ne 1 ]; then
  echo "Usage: `basename $0` TARGET_DB"
  exit 1
fi

target_db=$1

#might want to put connection details as bash argument.
mongo 127.0.0.1:27017/$target_db --quiet init.js

for f in $FILES
do
    filename=$(basename $f)
    collection=${filename%.*}
    mongoimport -d $target_db -c $collection $filename
done