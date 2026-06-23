# Rimsys Laravel Interview Challenge

This is a Laravel 13-based coding challenge used in technical interviews for Senior Full Stack Engineer candidates at Rimsys.

The interview is a 60-minute live backend exercise. You may use Claude Code, Codex, or another AI coding tool during the interview. We are interested in how you direct the tool, verify its work, reject bad suggestions, and make senior engineering tradeoffs under time pressure.

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

## Challenge Rules

- Do not modify or delete the provided tests.
- You may add your own tests.
- Visible tests are examples, not exhaustive acceptance criteria.
- Think aloud at natural checkpoints, especially when using AI-generated suggestions.
- Be prepared to explain what you completed, what remains, and what you would harden before production.
- Frontend work is out of scope unless your interviewer explicitly says otherwise.

## Running Tests

Run the tests using Pest:
```bash
php artisan test
```

Or using Composer:
```bash
composer test
```

## Project Scope

The project is a Regulatory Document Tracker that manages:
- **Products** — medical devices
- **Documents** — attached compliance and regulatory files
- **Document Types** — REGULATORY, TECHNICAL, QUALITY, and CLINICAL

The application is intentionally incomplete. Your task is to make the backend behavior work in an idiomatic Laravel way.

Expected behavior includes:
- `GET /api/products/{product}` returns product JSON or `404`.
- `GET /api/products/{product}/documents` returns only active documents attached to that product.
- `GET /api/products/{product}/documents?document_type=REGULATORY` filters active attached documents by type.
- `GET /api/products/{product}/documents/download` returns a zip response for a product's active documents.

Use normal Laravel conventions for migrations, Eloquent relationships, factories, query constraints, storage, and HTTP responses. Supported document types are `REGULATORY`, `TECHNICAL`, `QUALITY`, and `CLINICAL`.
