# Firefly Task

## Overview

Simple CRUD-based application for managing and keeping records of Transactions.

## Features

-   **Transaction Management**: Create, view, edit, and delete financial transactions
-   **Transaction Categories**: Categorize transactions as either Income or Expense
-   **Dashboard**: Visual overview of your financial status with recent activity
-   **Filtering**: Filter transactions by type (Income/Expense)
-   **Data Validation**: Comprehensive validation for all transaction data
-   **User Authentication**: Secure user accounts with Laravel's authentication system

## Screenshots

### Dashboard View

![Dashboard](https://github.com/user-attachments/assets/3d402045-cbe0-4450-9a4e-f7d5943187a0)
_The main dashboard provides an overview of financial status with recent transactions_

### Transaction List

![Transaction List](https://github.com/user-attachments/assets/6a15de99-8237-47a9-8d46-041747cb6d77)
_List of all transactions with filtering capability_

### Add Transaction Form

![Add Transaction Form](https://github.com/user-attachments/assets/c225c823-6779-47e9-8048-7ad58b8a5f41)
_Form for adding new income or expense transactions_

## Technology Stack

-   **Backend Framework**: Laravel
-   **Frontend**: Blade templates with Tailwind CSS
-   **Database**: MySQL
-   **Authentication**: Laravel Breeze
-   **Build Tool**: Vite
-   **Development Environment**: Laravel Herd

## Requirements

-   PHP 8.1 or higher
-   Composer
-   Node.js & NPM
-   MySQL database
-   Laravel Herd (recommended for local development)

## Installation

### 1. Clone and Configure the Project

```bash
# Clone the repository
git clone https://github.com/bpnpdl1/fireflytask
cd fireflytask

# Install dependencies
composer install
npm install

# Set up environment
cp .env.example .env
php artisan key:generate
```

### 2. Database Configuration

Update your `.env` file with your database credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fireflytask
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Set Up the Application

```bash
# Run migrations
php artisan migrate

# Compile frontend assets
npm run dev
```

### 4. Launch with Laravel Herd (Recommended)

-   Open Laravel Herd
-   Add your project to Herd
-   Click "Start Site" in the Herd interface
-   Click "View Site" to open your project in the browser

## Usage Guide

1. Register a new account or login with existing credentials
2. Navigate to the dashboard to see your financial overview
3. Add new transactions through the "Create Transaction" form
4. View and manage all transactions on the transaction index page
5. Use filters to view specific transaction types (Income/Expense)
6. Edit or delete transactions as needed

## Database Structure

The application uses the following main tables:

-   **users**: Stores user account information
-   **transactions**: Stores all financial transactions with the following fields:
    -   `id`: Unique identifier
    -   `description`: Transaction description
    -   `amount`: Transaction amount
    -   `type`: Transaction type (Income/Expense)
    -   `transaction_date`: Date when the transaction occurred
    -   `user_id`: Reference to the user who owns the transaction
    -   `created_at` and `updated_at`: Timestamps

## Development

### Laravel Herd

This project is optimized for Laravel Herd, which provides a streamlined development environment for Laravel on Windows, including:

-   PHP with optimized configuration
-   MySQL database
-   Automatic virtual host configuration
-   Easy SSL certificate management
-   Simple project management UI

### Testing

The project includes comprehensive test coverage:

**Transaction Tests**

![Transaction Test](https://github.com/user-attachments/assets/01c3f8b6-f500-48d1-919c-d6335aa170bc)

**Controller Tests**

![Transaction Controller Test](https://github.com/user-attachments/assets/16585d33-0832-4264-b365-21e283a89001)

Run tests with:

```bash
php artisan test
```

## Customization

-   Transaction types are managed through the `TransactionTypeEnum` enum
-   UI appearance is controlled via Tailwind CSS classes with specific background colors for different transaction types
-   Additional transaction categories can be added by extending the enum

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
