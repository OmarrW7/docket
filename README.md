# Docket — Laravel

Docket is a full-stack task management web application built with Laravel, PHP, MySQL, Blade, and Tailwind CSS. It provides authenticated users with a personal dashboard for creating, organizing, updating, and deleting tasks based on priority and status.

The application allows authenticated users to create, manage, update, and delete their personal tasks, with tasks organized by priority and status.

## Features

- User authentication
- Create, edit, and delete tasks
- Task priority levels
- Task status management
- Personal task lists for each authenticated user
- Task pagination
- Form validation
- Confirmation modal for task deletion
- Success/error notifications
- Database seeders and factories for test data
- Responsive user interface

## Tech Stack

- **Backend:** PHP, Laravel
- **Frontend:** Blade, Tailwind CSS, JavaScript
- **Database:** MySQL
- **Development Tools:** Composer, NPM, Vite, Laravel Artisan

## Project Structure

The project follows Laravel's MVC architecture:

- **Models** — Handle database relationships and application data
- **Controllers** — Handle application logic and HTTP requests
- **Views** — Blade templates for the user interface
- **Migrations** — Define and manage database structure
- **Seeders & Factories** — Generate development/test data
- **Routes** — Define application endpoints

## Database

The application uses MySQL and includes migrations for creating the required database tables.

User-task relationships are handled through Laravel's Eloquent ORM, allowing each authenticated user to access and manage their own tasks.

## Installation

1. Clone the repository

    ```bash
    git clone https://github.com/your-username/docket.git
    cd task-manager-laravel
    ```

2. Install PHP dependencies

    ```bash
    composer install
    ```

3. Install frontend dependencies

    ```bash
    npm install
    ```

4. Configure the environment

    Create a `.env` file from the example:

    ```bash
    cp .env.example .env
    ```

    Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Configure the database

    Create a MySQL database and update the database configuration in `.env`:

    ```env
    DB_DATABASE=your_database_name
    DB_USERNAME=root
    DB_PASSWORD=your_database_password
    ```

6. Run migrations and seed the database

    ```bash
    php artisan migrate --seed
    ```

7. Start the Vite development server

    ```bash
    npm run dev
    ```

8. Start the Laravel development server

    In another terminal:

    ```bash
    php artisan serve
    ```

    The application will be available at:

    ```text
    http://127.0.0.1:8000
    ```

## Demo Account

A demo administrator account is created when running the database seeders.

**Email:** `admin@example.com`  
**Password:** `password123`

## Example Workflow

1. Log in using a demo account.
2. View the user's task dashboard.
3. Create a new task.
4. Set its priority and status.
5. Edit or update the task when needed.
6. Delete completed or unnecessary tasks.

## What I Learned

This project was built to strengthen my practical understanding of Laravel and modern PHP development.

Key concepts practiced include:

- Laravel MVC architecture
- Routing and controllers
- Blade templating
- Eloquent ORM and relationships
- Database migrations
- Factories and seeders
- Authentication
- Form validation
- CRUD operations
- Laravel Artisan commands
- Environment configuration
- Vite and frontend asset management
- Tailwind CSS

## Future Improvements

Potential improvements include:

- Drag-and-drop task management
- Task search and filtering
- Due dates and reminders
- Task categories/tags
- User profile management
- REST API endpoints
- Automated testing
- Deployment to a production environment

## Author

**Omar Wael**
Junior Web Developer | PHP & Laravel
[GitHub](https://github.com/OmarrW7)
