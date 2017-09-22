mysql --host=localhost --user=root --password=hemaan123 iot_database -e "select * from Water_Level  INTO OUTFILE  '/var/www/html/filename.csv'  FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';"
