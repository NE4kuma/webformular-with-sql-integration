# webformular-with-sql-integration
A webformular that allows you to integrate your name and a review into the SQL database.
**Warnig**:


## Application/packages install
Before we can start, we need to install some necessary packages
```
sudo apt install apache2 php libapache2-mod-php php-mysql mariadb-server mariadb-client php-mysqli
```
**Notice:** If you are on a different distribution, make sure to use the correct installer. But it should be all the same staps

Go now to your `html`-directory 
```
cd /var/www/html
```
And Install also my repository**
```

```


## Set SQL-Database
First we have to secure our Database
```
sudo mysql_secure_installation
```
Take my setting: 
Switch to unix_socket authentication [Y/n] `n`
Change the root password? [Y/n] `n`
Remove anonymous users? [Y/n]`n`
Disallow root login remotely? [Y/n] `n`
Remove test database and access to it? [Y/n]`n`
Reload privilege tables now? [Y/n]`y`
**notice: Set a good password!**
### SQL configuration 
Now, we will start with the configuration of the SQL databases.
```
sudo mysql -u root -p
```
Now it sould looks like that

Built a database and get in threr
```
CREATE DATABASE formular_db;
USE formular_db;
```
Creat also the right tables:
```
CREATE TABLE user_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    message TEXT NOT NULL
);
```
We have to define a "user" who is responsible for saving the specified information into the Sql database
```
CREATE USER 'webuser'@'localhost' IDENTIFIED BY 'dein_passwort';
```
Sure Now we are almost done, just one more thing: we have to give the right permission
```
GRANT ALL PRIVILEGES ON formular_db.* TO 'webuser'@'localhost';
```
```
FLUSH PRIVILEGES;
```
We are finshed the the database :). You can exit
```
exit
```
____
## Webserver configuration 
Bevor we start, make sure you are in the right directory and remove the default `index.html` file
```
cd /var/www/html
rm /var/www/html/index.html
```
Now install/copy my respetory
```
sudo git YXY
```
**Optional**: you can remove my `README.md` 
```
rm README.ME
```
We are now finished, just restart and enable the apache2 webserver 
```

```
### Test
If everything goes right, then you see who gives his/hers reviews.
```
sudo mysql
```
There should be a database with the name of `formular_db`.
Go into
```
USE formular_db;
```
See what your tables
```
show tables;
```
It should be `user_data`. Now we can see what thair write
```
select * from user_data;
```
````
MariaDB [formular_db]> select * from user_data;
+----+-------------+---------------------+
| id | name        | message             |
+----+-------------+---------------------+
|  1 | test        | test                |
|  2 | Bob Johnson | Nice to meet you :) |
+----+-------------+---------------------+
````
ikn







