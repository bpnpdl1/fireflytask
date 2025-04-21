# Firefly Task - Personal Finance Tracker

A Laravel-based personal finance tracking application that helps users manage their income and expenses with a clean, user-friendly interface.

## Features

-   **Transaction Management**: Create, view, edit, and delete financial transactions
-   **Transaction Categories**: Categorize transactions as either Income or Expense
-   **User Authentication**: Secure user accounts with Laravel's authentication system
-   **Dashboard**: Visual overview of financial status
-   **Filtering**: Filter transactions by type (Income/Expense)
-   **Data Validation**: Comprehensive validation for all transaction data

## Technical Stack

-   **Framework**: Laravel
-   **Frontend**: Blade templates with Tailwind CSS
-   **Database**: MySQL
-   **Authentication**: Laravel Breeze
-   **CSS Framework**: Tailwind CSS
-   **Build Tool**: Vite
-   **Local Development Environment**: Laravel Herd

## Requirements

-   Laravel Herd (recommended for Windows development)
-   PHP 8.1 or higher
-   Composer
-   Node.js & NPM
-   MySQL database

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/bpnpdl1/fireflytask
    cd fireflytask
    ```

2. Install PHP dependencies:

    ```bash
    composer install
    ```

3. Install NPM dependencies:

    ```bash
    npm install
    ```

4. Create a copy of the `.env.example` file:

    ```bash
    cp .env.example .env
    ```

5. Generate an application key:

    ```bash
    php artisan key:generate
    ```

6. Configure your database in the `.env` file:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=fireflytask
    DB_USERNAME=root
    DB_PASSWORD=
    ```

7. Run the database migrations and seeders:

    ```bash
    php artisan migrate --seed
    ```

8. Compile assets:

    ```bash
    npm run dev
    ```

9. Using Laravel Herd:
    - Open Laravel Herd
    - Add your project to Herd
    - Click on "Start Site" in the Herd interface
    - Click on "View Site" to open your project in the browser

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

## Usage

1. Register a new account or login with existing credentials
2. Use the dashboard to view your financial overview
3. Add new transactions through the "Create Transaction" form
4. View all transactions on the transaction index page
5. Filter transactions by type (Income/Expense)
6. Edit or delete transactions as needed

## Development

### Laravel Herd

This project is configured to work with Laravel Herd, which provides an optimized development environment for Laravel on Windows. Laravel Herd includes:

-   PHP with optimized configuration
-   MySQL database
-   Automatic virtual host configuration
-   Easy SSL certificate management
-   Simple project management UI

### Testing

Run the test suite with:

```bash
php artisan test
```

The application includes both feature and unit tests covering transaction functionality.

### Customization

-   Transaction types are managed through the `TransactionTypeEnum` enum
-   Styling uses Tailwind CSS classes with specific background colors for different transaction types

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
