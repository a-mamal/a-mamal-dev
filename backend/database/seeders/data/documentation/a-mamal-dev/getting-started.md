---
title: Getting started
order: 3
---

## What you need

Before running the project locally, ensure you have the following installed:

- **Backend:** PHP, Composer and MariaDB
- **Frontend:** Node.js and npm
- **General:** Git

## Get the code

```bash
git clone https://github.com/a-mamal/a-mamal-dev
cd a-mamal-dev
```

## Run the backend

1. Navigate to the backend directory and install the dependencies:

    ```bash
    cd backend
    composer install
    ```

2. Copy the example environment file:

    ```bash
    cp .env.example .env
    ```

    > On Windows PowerShell, use `Copy-Item .env.example .env` instead.

3. Generate the application key:

    ```bash
    php artisan key:generate
    ```

4. Check the database settings in `backend/.env`. The defaults expect a local MariaDB with the user `root` and an empty password. If yours is different, update `DB_USERNAME` and `DB_PASSWORD`.

5. Create the tables and seed the database:

    ```bash
    php artisan migrate --seed
    ```

6. Start the API:

    ```bash
    php artisan serve
    ```

The seeders load the projects and documentation pages from `database/seeders/data/`, so there is real content from the start.

## Run the frontend

In a second terminal, from the project root:

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

## Check that it works

Open the address Vite prints in the terminal. You should see the projects list. If it is empty, make sure the backend is running.

## If something goes wrong

- **Database connection error:** check the credentials in `backend/.env`.
- **The projects list is empty:** check that `php artisan serve` is still running and that the seeders ran.