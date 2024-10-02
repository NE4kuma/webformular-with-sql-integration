# webformular-with-sql-integration
A webformular that allows you to integrate your name and a review into the SQL database.


## Application/packages install
Before we can start, we need to install some necessary packages
```
sudo apt install php libapache2-mod-php mariadb-server apache2
```
```
git clone 
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
create database opinions;
```
**Notice:** you can also look wether the database has created:
```
show databases;
```
Get in the database
```
use opinions;
```
Well we configuration the table
```
create table user_opinion (
  id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  reviewer_name CHAR(50),
  details VARCHAR(4000)
  );
```
Make sure that you create a user, which responsible to translation the data to the Database:
```
GRANT ALL ON reviews.* to review_site@localhost IDENTIFIED BY 'YJy22f-44';
```
We are finshed the the database :).
____
## Webserver configuration 
We have already installed apache so we only have to start and enable.
```
sudo systemstl apache start
sudo systemstl apache enable
```
Now we have to put 2 files on the weblocation 
```
mv end.php /var/www/html && mv html.php /var/www/html
```

