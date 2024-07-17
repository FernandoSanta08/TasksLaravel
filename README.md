# Task Manager

This is a basic CRUD (Create, Read, Update, Delete) application for managing tasks, built with Laravel.

## Features

- Create a new task
- View all tasks
- Edit a task
- Delete a task

## Requirements

- PHP 8.2 or higher
- Composer
- Laravel 11.x
- MySQL or any other supported database
- Node

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/FernandoSanta08/TasksLaravel task-manager
    cd task-manager
    ```

2. Install the dependencies:
    ```bash
    composer install
    ```

3. Copy the `.env.example` file to `.env`:
    ```bash
    cp .env.example .env
    ```

4. Generate the application key:
    ```bash
    php artisan key:generate
    ```

5. Configure your database settings in the `.env` file:
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=task_manager
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

6. Run the database migrations:
    ```bash
    php artisan migrate
    ```

7. Start the development server:
    ```bash
    php artisan serve
    ```

## Usage

Once the server is running, you can access the application at `http://localhost:8000`. From there, you can perform the following operations:

- **Create a new task:** Click on the "Create Task" button and fill in the required details.
- **View all tasks:** The homepage displays a list of all tasks.
- **Edit a task:** Click on the "Edit" button next to the task you want to update.
- **Delete a task:** Click on the "Delete" button next to the task you want to remove.

## Routes

The application uses the following routes:

- `GET /tasks`: Display a listing of tasks.
- `GET /tasks/create`: Show the form for creating a new task.
- `POST /tasks`: Store a newly created task in storage.
- `GET /tasks/{task}`: Display the specified task.
- `GET /tasks/{task}/edit`: Show the form for editing the specified task.
- `PUT /tasks/{task}`: Update the specified task in storage.
- `DELETE /tasks/{task}`: Remove the specified task from storage.

## API Routes
- `GET /api/tasks`: Display a listing of tasks.
- `POST /api/tasks`: Store a newly created task in storage.
- `GET /api/tasks/{task}`: Display the specified task.
- `PUT /api/tasks/{task}`: Update the specified task in storage.
- `DELETE /api/tasks/{task}`: Remove the specified task from storage.

## POSTMAN API TEST

There is a postman collection in the root folder containing some API Test.

To test the API endpoints, a Postman collection is provided. You can execute this collection using Newman and generate an HTML report with `newman-reporter-htmlextra`.

### Installation

1. Install Newman globally:
    ```bash
    npm install -g newman
    ```

2. Install the htmlextra reporter globally:
    ```bash
    npm install -g newman-reporter-htmlextra
    ```

### Running the Collection

1. Run the collection using Newman:
    ```bash
    newman run CRUD.postman_collection.json -e DEV.postman_environment -r htmlextra
    ```

2. After the collection has run, an HTML report will be generated in the current directory.
