#!/usr/bin/env bash
echo deploying to $1

if [ -d "$1" ]
then
	echo directory $1 not found
	exit 1
fi

cp -a * $1

rm $1/deploy.sh

