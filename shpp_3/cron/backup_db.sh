#!/bin/bash

DB_USER="root"
DB_PASSWORD="tiger"
DB_NAME="shpp_3"
BACKUP_DIR="/home/101/shpp_3/cron/db_backup"

#
BACKUP_FILE="$BACKUP_DIR/db_backup_$(date +'%Y%m%d').sql"

#
mysqldump -u $DB_USER -p$DB_PASSWORD $DB_NAME > $BACKUP_FILE

