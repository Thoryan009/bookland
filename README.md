# Laravel Bookshop Ecommerce Project

## Introduction
Laravel Bookshop Ecommerce Project is a web-based application for managing an online bookstore. This project is built using Laravel 11 and includes features such as product listing, shopping cart, order management, and user authentication.

## Installation

### Prerequisites
Ensure you have the following installed on your system:
- PHP (>= 8.2)
- Composer
- MySQL or any supported database
- Node.js & NPM (for frontend dependencies)

### Steps to Install
1. Clone the repository:
   ```sh
   git clone https://github.com/mehedihasanit12/laravel-bookshop-ecommerce-project.git
   ```
2. Navigate into the project directory:
   ```sh
   cd laravel-bookshop-ecommerce-project
   ```
3. Install PHP dependencies:
   ```sh
   composer install
   ```
4. Copy the environment file:
   ```sh
   cp .env.example .env
   ```
5. Generate application key:
   ```sh
   php artisan key:generate
   ```
6. Set up your database credentials in the `.env` file.
7. Run migrations and seed the database:
   ```sh
   php artisan migrate --seed
   ```
8. Install NPM dependencies and build assets:
   ```sh
   npm install && npm run dev
   ```
9. Serve the application:
   ```sh
   php artisan serve
   ```

## Features
- User Authentication (Login, Register, Logout)
- Product Management (Add, Edit, Delete Books)
- Shopping Cart & Checkout System
- Order Management
- Admin Dashboard

## Usage
- Access the app at `http://127.0.0.1:8000/`
- Use the admin dashboard for book & order management.


## Contact
For any queries, contact [mehedihasanit242@gmail.com] or open an issue in the repository.

