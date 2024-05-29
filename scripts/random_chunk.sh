#!/bin/bash

# Check if the correct number of arguments are provided
if [ "$#" -ne 2 ]; then
    echo "Usage: $0 <file> <delimiter>"
    exit 1
fi

file=$1
delimiter=$2

# Check if the file exists
if [ ! -f "$file" ]; then
    echo "File not found!"
    exit 1
fi

# Read the file, split by the delimiter, and store the chunks in an array
IFS="$delimiter" read -d '' -ra chunks < "$file"

# Get the total number of chunks
total_chunks=${#chunks[@]}

# Select a random chunk index
random_index=$(( RANDOM % total_chunks ))

# Output the random chunk
echo "${chunks[$random_index]}"
