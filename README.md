# Pile of Jewelry - Jewelry Shop Website - epl343.winter21.team2 
## About
The website for the online jewelry store "Pile Of Jewelry" (Prototype Version).

It was implemented as part of the final project for lesson EPL343: Software Engineering.

For this assignment, different web design technologies where used, such as HTML, CSS, PHP and Bootstrap.

## Features
This website was designed to be an online jewelry shop, where the owner can sell its products online. The features were specified by the client during the semester. This is a prototype where most of its fuctions are fully operational. Its features consist of:

### Customers' features:
1. Browse products of the shop by filtering the products into categories by type of product.
2. Viewing a product's information such as price, images and name.
3. Viewing a gift guide for gift recomendations.
4. Adding products to their basket.
5. Viewing their basket.
6. Creating an account to place an order.
7. Logging in to the account and logging out.
8. Customer can reset his password
9. Viewing information about the shop usig the Conact Us, About Us and FAQ pages.

### Admin's features:
1. Login as administrator.
2. View the total number of users,products and orders of the shop.
3. Add,Edit or Delete products from the shop.
4. Viewing the list of registered users.
5. Viewing the orders that were made.

* In the prototype the order is not implemented as well as the ability of the admin to add edit or delete products from the shop.

### Account features:
Users can sign up to create an account in order to add items to their cart and place an order. They can sign up by using the Account page and entering their information. That information is saved in our database. The user information gets validated, such as a unique valid email address, confirm password, etc. Also, their password is encrypted in our database using md5 encyprion. 
Users can log in to their account by using the Account page too, by inserting their email and password they signed up with. In case they forget their password they can reset it. The system will send an email for the reset process

The administrator logs into her page to edit/add/delete products by the account page when she logs in with her unique administrator email and password.

## Login
For the purposes of the demonstration we hard-coded two users with the following user credentials:

Normal registered user-customer:
username: user@email.com
password: 123

Account with admin privileges:
username: admin@email.com
password: 12345

## Supported Devices:
We tested our website on:
1. Computers
2. Smartphones
3. Tablets

* The website is responsive for smaller devices as wel

## Supported Browsers:
We tested our website on:
1. Google Chrome
2. Mozilla Firefox
3. Microsoft Edge
4. Brave

# Installation

* Tested in Windows 10

## Database

* The website is connected to an Azure SQL database. The latest PHP and ODBC drivers for MS SERVER need to be installed to have a functional database.

## Web Server

* The website is running locally using XAMPP. The latest version of XAMPP needs to be installed (PHP v8.0 included). 
Make sure to install XAMPP directly in the C: disk and not inside any Program files directory for it to properly work.

* For the database to properly work, The PHP and ODBC drivers (dll files) for MS SERVER need to be placed inside xampps php extensions directory. (C:\xampp\php\ext)
```
php_sqlsrv_80_ts_x64.dll
php_pdo_sqlsrv_80_ts_x64.dll
```
You can add all the .dll files in the directory but only the 2 ones above are necessary for our current system.

* After adding the files we need to make sure 
```
extension=php_pdo_sqlsrv_80_ts_x64.dll
extension=php_sqlsrv_80_ts_x64.dll
```
are added in the php.ini file of xampp in the extensions location

* Lastly we need to change the DocumentRoot and Directory inside the httpd.conf file of xampp to have the path of our project.

* The webserver by default runs on port 80 but we can change the port as we like in httpd.conf

* After these steps, if we open xampp and start the Apache web server, typing `http://localhost:8081` will take us in our index page in our project directory that we set.

## Password Reset

* For the password reset to work, we can download a Test Mail Server Tool since an email is send locally to the user. The Mail Server listens by default on port 25. XAMPP does not need any further adjustments to work with the Mail Server, we just need to have the Mail Server running in the background.