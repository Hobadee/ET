#!/bin/sh

#
#
# Pull file from server, run file.
# Store result - send result on next check-in
#

# Pull config info
ET_CFG="/etc/et.cfg"

if [ -f $ET_CFG ] then
	. $ET_CFG
fi
#else fail and throw exception; we need the remote address!

# Remote-Agent should properly update:
ET_RA="ET/1.0 (Macintosh; Intel Mac OS X 10_6_8)"

ET_SCRIPT="/tmp/et.sh"
# delete script, touch it, set strict permissions (0500 root:root)
# ensure curl doesn't overwrite permissions


# Loop to create data string


curl --data "param1=value1&param2=value2" -A $ET_RA $ET_REMOTE -o $ET_SCRIPT

# run ET_SCRIPT and store result