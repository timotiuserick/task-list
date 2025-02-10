# Deploying Task List

Task List is using Laravel 11 so for full compatibility please consider using PHP >= 8. Below is instruction how to deploy this app in two conditions.
1. PC that already setup Laravel 11.
2. PC that doesn't have Laravel yet or fresh installation.

# Already setup Laravel
1. Extract "task-list.zip" to any folder.
2. Open the extracted folder.
3. Open ".env" file.
4. Adjust the database configuration fields according to database settings in user's PC.
	- DB_CONNECTION
	- DB_HOST
	- DB_PORT
	- DB_DATABASE
	- DB_USERNAME
	- DB_PASSWORD
5. Open MySQL database software (like phpMyAdmin or MySQL Workbench) and create database with same settings as the above ".env" file.
6. Open cmd or terminal.
7. Go to the extracted folder in cmd or terminal.
8. Run "php artisan migrate:refresh --seed".
9. See database and check if initial/dummy data already created or no.
	- If no, user can also import the database provided inside "task-list.zip", the filename is  "task_list.sql".
11. After initial data already imported, back to cmd/terminal and run "php artisan serve".
12. Open "localhost:8000" in Browser.

# No Laravel yet (Windows)
1. Download and install Xampp or Lampp newest version that's using PHP 8 here https://www.apachefriends.org
2. After that, open "xampp-control.exe" file, usually it's in "C:\xampp\xampp-control.exe".
	- Click "Start" button in Apache row to start Apache service.
	- Click "Start" button in MySQL row to start MySQL service.
		- If there's some error, please try to browse it because the reason may be different for each person. Don't hesitate to contact me!
3. After both service already started, open "localhost/phpmyadmin" in Browser.
4. Create new database using any name. We will use "task-list-db" as an example in this guide.
5. Import the database provided inside "task-list.zip", the filename is  "task_list.sql"
	- Make sure the import is successful so tables and its dummy data are created successfully.
7. Extract "task-list.zip" to any folder in "C:\xampp\htdocs". THIS IS IMPORTANT! For example we will use "task-list" as folder name.
8. Open the extracted folder. For example the targetted folder will be "C:\xampp\htdocs\task-list".
9. Open ".env" file.
10. Change "DB_DATABASE" value to same database name used in step no 4. For example put "task-list" here so it will become "DB_DATABASE=task-list-db".
11. Open "localhost/{extracted_folder_name/public}" in Browser. Using the provided example before, it will be "localhost/task-list/public".
