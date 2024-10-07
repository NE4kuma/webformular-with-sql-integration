![2024-10-07_19-50](https://github.com/user-attachments/assets/173b2f4a-33cc-4f09-b950-85f5c351b51b)

# Webformular-with-SQL-integration
A web form that allows users to submit their name and a review, which is then saved in an SQL database.

**Warning**: This project is designed for learning purposes only. It is not intended for professional use and is suitable for school or study projects. <br>
**Recommended**: Log in as root, because many of the commands need root privileges. If not, make sure to type `sudo` before every command.

## Installation (Application/Package) 
Before we begin, we need to install the necessary packages.

```bash
apt install apache2 php libapache2-mod-php php-mysql mariadb-server mariadb-client php-mysqli git
```
**Notice:** If you're using a different Linux distribution, make sure to use the correct `package manager`. The steps should be similar across distributions.

## Set SQL-Database
First we have to secure our Database
```
mysql_secure_installation
```
Use the following settings (you can adjust as needed): <br>
Switch to unix_socket authentication [Y/n] `n`<br>
Change the root password? [Y/n] `n` <br>
Remove anonymous users? [Y/n]`n` <br>
Disallow root login remotely? [Y/n] `n` <br>
Remove test database and access to it? [Y/n]`n` <br>
Reload privilege tables now? [Y/n]`y` <br>

**Note**: Make sure to set a strong password for your database.
### Configuring the SQL Database
Log in to the MariaDB shell:
```
mysql -u root -p
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
CREATE USER 'webuser'@'localhost' IDENTIFIED BY 'NS!?s+f';
```
Grant the necessary permissions to the new user:
```
GRANT ALL PRIVILEGES ON formular_db.* TO 'webuser'@'localhost';
FLUSH PRIVILEGES;
```
You have now successfully set up the database:). You can exit the MariaDB shell:
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
git clone git clone https://github.com/NE4kuma/webformular-with-sql-integration
```
Move the important files into `/var/www/html` 
```
mv webformular-with-sql-integration/submit.php webformular-with-sql-integration/index.html .
```

**(Optional)** If you want to remove the directory (and README.md) file from the cloned repository:
```
rm -rf webformular-with-sql-integration/
```
At least give the right permissen:
```
chown -R www-data:www-data /var/www/html/
chmod -R 755 /var/www/html/
```
**Recommended**: Restart and enable the Apache web server:
```
systemctl restart apache2
systemctl enable apache2
```
### Testing
To verify that everything is working correctly.<br>
First, open your browser and type:
```
http://localhost
```
Give whatever you want (as an example). <br>
Now we want to see the information we entered, so write:
```
mysql
```
Select the `formular_db` database: <br>
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
**OUTPUT**: should be like that:
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
Hopefully, everything is working. If not, please leave a comment in the Issues tab. Thank you for paying attention, and have a nice day :)<br>
~ NeSec
