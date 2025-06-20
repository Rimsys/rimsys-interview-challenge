# Rimsys Interview Challenge

This is a Laravel 12-based coding challenge used in technical interviews for Senior Full Stack Engineer candidates at Rimsys.

## Setup Instructions

1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd <repository-directory>
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Copy the environment file and configure it for SQLite:
   ```bash
   cp .env.example .env
   ```

4. Update the `.env` file to use SQLite:
   ```
   DB_CONNECTION=sqlite
   DB_DATABASE=:memory:
   ```

5. Generate application key:
   ```bash
   php artisan key:generate
   ```

6. Run migrations and seed the database:
   ```bash
   php artisan migrate --seed
   ```

7. Install frontend dependencies and build assets:
   ```bash
   npm install && npm run dev
   ```

8. Start the development server:
   ```bash
   php artisan serve
   ```

## Running Tests

Run the tests using Pest:
```bash
php artisan test
```

Or using Composer:
```bash
composer test
```

## Interview Challenge Tasks

1. Get all existing tests to pass
2. Add the missing ProductDocument model
3. Add necessary migrations or schema changes
4. Implement the missing relationships
5. Fix the bug in DocumentController
6. Add the /api/products/{product}/documents/download endpoint

## Project Structure

The project is a Regulatory Document Tracker that manages:
- **Products** — medical devices
- **Documents** — attached compliance and regulatory files
- **Document Types** — enum for types (REGULATORY, TECHNICAL, etc.)

Some models and routes are defined. Others are missing or incomplete. A handful of tests are passing. Several are failing intentionally.
