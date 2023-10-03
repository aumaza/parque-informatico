#!/bin/bash
fecha=`date +%d-%m-%Y`
archivo="parinfo-$fecha.sql"
#mysqldump --user=root --password=slack142 --host=localhost parinfo > $archivo
mysqldump --user=root --password=slack142 --host=slackzone.ddns.net parinfo > $archivo
chmod 777 $archivo
mv $archivo sqls/


