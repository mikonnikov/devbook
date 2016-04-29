#!/bin/bash
# Create Mysql DB dump
# @param $1 db name 

HOST=localhost
USER=root
PASSWORD=123
DATABASE=devbook
STRUCT_FILE=devbook_struct.sql
DATA_FILE=devbook_data.sql

# add large tables here: their content will be not dumped
EXCLUDED_TABLES=(
)

IGNORED_TABLES_STRING=''
IGNORED_TABLES=''
for TABLE in "${EXCLUDED_TABLES[@]}"
do :
   IGNORED_TABLES+=" ${TABLE}"
   IGNORED_TABLES_STRING+=" --ignore-table=${DATABASE}.${TABLE}"
done

# dump struct
echo "Dumping structure ... "
mysqldump --host=${HOST} --user=${USER} --password=${PASSWORD} --single-transaction --no-data ${DATABASE} > ${STRUCT_FILE}
echo "OK"
echo ""

# dump data
echo "Dumping content ... "
echo "Ignored large tables: ${IGNORED_TABLES} "
mysqldump --no-create-info --replace --host=${HOST} --user=${USER} --password=${PASSWORD} ${DATABASE} ${IGNORED_TABLES_STRING} >> ${DATA_FILE}
echo "OK"
echo ""

# finish
echo "DONE."
