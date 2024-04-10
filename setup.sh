#!/bin/bash
set -euo pipefail

source .env

ORIGINAL_THEME_NAME='WI Starter FSE'
ORIGINAL_THEME_SLUG=wi-starter-fse
ORIGINAL_THEME_NAMESPACE='WI\\StarterFSE'

# Replace all uses of the theme name, slug and namespace in the project files.
# Checks *.php, *.html, *.css, *.ts, *.json, *.md, *.txt

dirs=('includes' 'parts' 'patterns' 'templates' 'blocks')
for dir in ${dirs[@]}; do
	echo "Scanning $dir"
	files=(`find $dir -type f -name '*.php' -o -name '*.html' -o -name '*.css' -o -name '*.ts' -o -name '*.json' -o -name '*.md' -o -name '*.txt'`)
	for file in ${files[@]}; do
		echo "Updating $file"
		sed -i '' -e "s/$ORIGINAL_THEME_NAME/$THEME_NAME/g" $file
		sed -i '' -e "s/$ORIGINAL_THEME_SLUG/$THEME_SLUG/g" $file
		sed -i '' -e "s/$ORIGINAL_THEME_NAMESPACE/$THEME_NAMESPACE/g" $file
	done
done

# Special cases
files=('composer.json' 'package.json' 'README.md' '.gitignore' '.prettierignore' 'style.css' 'theme.json' 'readme.txt' 'functions.php')
for file in ${files[@]}; do
	echo "Updating $file"
	sed -i '' -e "s/$ORIGINAL_THEME_NAME/$THEME_NAME/g" $file
	sed -i '' -e "s/$ORIGINAL_THEME_SLUG/$THEME_SLUG/g" $file
done
