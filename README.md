# webformular-with-sql-integration
A webformular that allows you to integrate your first and last name into the SQL database.


## Application/packages install
Before we can start, we need to install some necessary packages
```
sudo apt install php libapache2-mod-php mariadb-server apache2
```
**Notice:** If you are on a different distribution, make sure to use the correct installer.

## Set SQL-Database
Now, we will start with the configuration of the SQL databases.
```
mysql -u root -p
```
Now it sould looks like that
YXYpic_1
Built a database
```
creat database opinions;
```
**Notice:** you can also look wether the database has created:
```
show databases;
```
Get in the database
```
use opinions:
```
