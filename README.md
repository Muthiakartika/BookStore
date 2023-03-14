### Installation Step for BookStore Web System

1. First, we need to install composer in the computer,
2. Next, we need to copy the folder of source code to htdocs folder in “C:\xampp\htdocs”,
3. Run the XAMPP application:
     - Start the “Apache” and “MySQL”,
     - Click the “Admin” in MySQL or open “http://localhost/phpmyadmin” 
     - in browser and create database with the name “db_bookstore”,
4. To open the "bookstore" folder in htdocs, click the address bar, and type in "cmd",
5. When command prompt opened, type "php artisan migrate" to create new migration. 
   After a moment, type "php artisan migrate:fresh --seed" to create new faker data in seeder.
6. After that type "php artisan serve", then a link will appear. Copy the link and paste it 
   in the search field in the browser and press enter.
7. The BookStore website has been successfully accessed.
