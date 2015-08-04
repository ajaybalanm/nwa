#!/bin/bash

DIR=$( cd "$( dirname "$0" )" && pwd )

> $DIR/bundle.js

sed '/<!--BUNDLE_AND_MINIFY/,/BUNDLE_AND_MINIFY-->/!d' $DIR/index.html \
  | tail -n +2 \
  | tail -r | tail -n +2 | tail -r \
  | sed -n 's:.*\"js\/\(.*\)\">.*:\1:p' \
  | xargs -I{} -n1 cat $DIR/js/{} >> $DIR/bundle.js

cat $DIR/bundle.js | uglifyjs > $DIR/js/bundle.min.js
rm -f $DIR/bundle.js
