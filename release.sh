#!/bin/bash

npm run build

# Creates a release package
DIR="./_release"
mkdir -p "$DIR"

# Update Version
perl -pe '/^Version: / and s/(\d+\.\d+\.\d+\.)(\d+)/$1 . ($2+1)/e' -i style.css

#Sync files
rsync -va ./dist/ ./_release/dist/
rsync -va ./fonts/ ./_release/fonts/
rsync -va ./images/ ./_release/images/
rsync -va ./templates/ ./_release/templates/
cp -v ./index.php ./_release/

# Delete hidden files
find ./_release/ -name '.DS*' -delete

# Copy files to LIVE server
rsync -rva ./_release/ vemamuwo@sl1702.web.hostpoint.ch:/home/vemamuwo/www/mistermilano.it/

rm -rf "$DIR"

echo "Done";