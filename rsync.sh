# Name/NIM	: Jenika Sutojo/18213003 - Andra Wahyu Purnomo/18213004
# Day, Date	: Thursday, 29 Oktober 2015
# File		: rsync.sh

#!/bin/bash

wget -r --reject="robots.txt" --reject="index.html" --reject="index1.html" -P /home/andra/Documents -A jpg -nd http://www.allkpop.com
rsync -avz -e --progress --include '*/' --include '*.jpg' --exclude '*' /home/andra/Documents /home/andra/Documents/ImageBackup
