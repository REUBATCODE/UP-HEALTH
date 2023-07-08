#var=$(date +"%FORMAT_STRING")
#now=$(date +"%m_%d_%Y")
today=$(date +"%Y-%m-%d_%M_%S")
printf "Hoy vamos a respaldar la base de datos MySQL mydb '%s'\n" "mydb-${today}.sql"
#stop mysqlserver
docker exec -ti up-health-mysql-1 mysqldump -usail -ppassword example_app > "mydb-${today}.sql"
echo "${today}_by_ivan_chenoweth" >> log.txt
#start mysqlserver
#   Tested from codebases:
# docker exec -ti up-health-mysql-1 mysqldump -usail -ppassword example_app > test.sql