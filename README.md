# a-mamal.dev

A learning-in-public project exploring Laravel, React, TypeScript, and API development.

## Table of Contents

- [Tech Stack](#tech-stack)
- [Architecture](#architecture)
- [Prerequisites](#prerequisites)
- [Local Development Setup](#local-development-setup)
  - [Backend](#backend)
  - [Frontend](#frontend)
- [Project Status](#project-status)
- [License](#license)

## Tech Stack

### Backend
- PHP
- Laravel
- MariaDB
- Laravel Sanctum

### Frontend
- React
- TypeScript
- Vite

## Architecture

The project uses a monorepo structure containing two independent applications:

- `backend/` — Laravel application responsible for server-side logic, database operations, and API endpoints.
- `frontend/` — React and TypeScript application built with Vite.

The frontend will communicate with the backend through HTTP requests to its API.

## Prerequisites

Before running the project locally, ensure you have the following installed:

- PHP and Composer
- Node.js and npm
- MariaDB
- Git

## Local Development Setup

### Backend

1. Navigate to the backend directory:

   ```bash
   cd backend
   ```

2. Install the dependencies:

   ```bash
   composer install
   ```

3. Copy the example environment file:

   ```powershell
   Copy-Item .env.example .env
   ```

4. Generate the application key:

   ```bash
   php artisan key:generate
   ```

5. Create a MariaDB database for the project and configure its connection details in `.env`.

6. Run the database migrations:

   ```bash
   php artisan migrate
   ```

7. Start the Laravel development server:

   ```bash
   php artisan serve
   ```

The backend will be available at `http://127.0.0.1:8000`.

### Frontend

1. Navigate to the frontend directory:

   ```bash
   cd frontend
   ```

2. Install the dependencies:

   ```bash
   npm install
   ```

3. Start the Vite development server:

   ```bash
   npm run dev
   ```

The frontend will be available at the URL displayed in the terminal, typically `http://localhost:5173`.
