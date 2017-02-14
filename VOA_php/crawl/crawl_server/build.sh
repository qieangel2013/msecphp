#!/bin/bash

if [ -a "msec.tgz" ]; then
    rm msec.tgz
fi

tar czvf msec.tgz --exclude="build.sh" --exclude="*.proto" --exclude="README" ./* 
