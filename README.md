# Webformular-with-SQL-integration
A web form that allows users to submit their name and a review, which is then saved in an SQL database.

**Warning**: This project is designed for learning purposes only. It is not intended for professional use and is suitable for school or study projects.

## Installation (Application/Package) 
Before we begin, we need to install the necessary packages.

```bash
sudo apt install apache2 php libapache2-mod-php php-mysql mariadb-server mariadb-client php-mysqli
```
**Notice:** If you're using a different Linux distribution, make sure to use the correct package manager. The steps should be similar across distributions.

## Set SQL-Database
First we have to secure our Database
```
sudo mysql_secure_installation
```
Use the following settings (you can adjust as needed): 
Switch to unix_socket authentication [Y/n] `n`
Change the root password? [Y/n] `n`
Remove anonymous users? [Y/n]`n`
Disallow root login remotely? [Y/n] `n`
Remove test database and access to it? [Y/n]`n`
Reload privilege tables now? [Y/n]`y`
**Note**: Make sure to set a strong password for your database.
### Configuring the SQL Database
Log in to the MariaDB shell:
```
sudo mysql -u root -p
```
Once logged in, create the database and tables:
```
CREATE DATABASE formular_db;
USE formular_db;
```
Create a table to store the user data:
```
CREATE TABLE user_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    message TEXT NOT NULL
);
```
Create a user who will be responsible for interacting with the database:
```
CREATE USER 'webuser'@'localhost' IDENTIFIED BY 'NS!?$"31t';
```
Grant the necessary permissions to the new user:
```
GRANT ALL PRIVILEGES ON formular_db.* TO 'webuser'@'localhost';
FLUSH PRIVILEGES;
```
You have now successfully set up the database:) Exit the MariaDB shell:
```
exit
```
____
## Web Server Configuration
Navigate to the correct directory and remove the default `index.html` file:
```
cd /var/www/html
rm /var/www/html/index.html
```
Now install/copy my respetory
```
sudo git clone YXY
```
**(Optional)** If you want to remove the README.md file from the cloned repository:
```
rm README.ME
```
Restart and enable the Apache web server:
```
sudo systemctl restart apache2
sudo systemctl enable apache2
```
### Testing
To verify that everything is working correctly:
```
sudo mysql
```
Select the `formular_db` database:
Go into
```
USE formular_db;
```
Display the available tables:
```
SHOW TABLES;
```
You should see the `user_data` table.
```
select * from user_data;
```
`````
MariaDB [formular_db]> select * from user_data;
+----+-------------+---------------------+
| id | name        | message             |
+----+-------------+---------------------+
|  1 | test        | test                |
|  2 | Bob Johnson | Nice to meet you :) |
+----+-------------+---------------------+
`````
## Conculution
hopefilly everything is working. If not, please write a comment in the `ìssues` tabe. Thank you for paying attation and have a nice day :)
~ NeSec
