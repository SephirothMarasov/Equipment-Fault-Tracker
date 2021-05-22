# Equipment Fault Tracker

A very simple equipment fault tracking form which can send data to a mariadb/mysql database. This also has support to search the database.

Requirements:

* PHP
* Webserver with your domain linked (*caddy,nginx,apache2*)


Mysql or Mariadb database with a table set up. This set-up needs your database name and table name inserted I have marked where you need to do this with [INSERT TABLE NAME/DB NAME HERE], 
make sure to also remove the brackets. 

Mysql or Mariadb database with a table set up. This set-up needs your database name and table name inserted I have marked where you need to do this with [INSERT TABLE NAME/DB NAME HERE], make sure to also remove the brackets


The database table in this example has **STORE, SN, FAULT and DATE** - you can adjust these to suit your own needs throughout the **ACTION_PAGE.PHP**, **INDEX.PHP** and **BACKEND-SEARCH.PHP**.

For Loging in you have to update the **CONFIG.PHP** file with a username and password, the password needs to be salted first. When entering the password in the login screen you will use the unsalted password you used.

When all the requirements and adjustments have been made to suit, upload the file into where you want to host your site i.e /var/www/equipment.fault.tracking.com
then head to your domain address in your browser (tested on firefox, chrome and brave)

![Equipment Fault Tracker](https://i.imgur.com/1FbOdXi.png)
