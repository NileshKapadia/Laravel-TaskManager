Laravel Task Management Application
--------------------------------------
This is a simple Laravel web application for managing tasks. Users can create, edit, delete, and reorder tasks using drag-and-drop functionality. Tasks can also be associated with projects.

Features
---------
Create, edit, and delete tasks.

Drag-and-drop reordering of tasks (priority updates automatically).

Assign tasks to projects.

View tasks filtered by project.

To Setup Project Locally here is the instructions
----------------------------------------------

Prerequisites

PHP (>= 8.1)

Composer (for dependency management)

MySQL (or any other database supported by Laravel)

Step 1 : deonload code

git clonehttps://github.com/NileshKapadia/Laravel-TaskManager.git
cd LARAVEL_TaskManager

Step 2 : Install PHP Dependencies
composer install

set 3: Set Up the Environment File

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=your_password

Step 4 : Generate an application key
php artisan key:generate

Step 5 : Set Up the Database

php artisan migrate

Step 6 : Run the Application loccaly
php artisan serve


Technologies Used
-----------------
Backend: Laravel (PHP)

Frontend: HTML, CSS, JavaScript, Bootstrap

Database: MySQL

Other Tools: Composer, npm
