---
title: Database
order: 5
---

## Overview

The project uses MariaDB, accessed through Eloquent models. Migrations live in `backend/database/migrations/` and seeders in `backend/database/seeders/`.

## Relationships

- A **user** has many **projects** and many **pets**.
- A **project** belongs to one **user** and has many **documentation pages**.
- A **documentation page** belongs to one **project**.
- A **pet** belongs to one **user**.

Deleting a user also deletes their projects and pets, and deleting a project also deletes its documentation pages.

## Table: `users`

| Column              | Type         | Nullable | Notes                                |
|---------------------|--------------|:--------:|--------------------------------------|
| `id`                | bigint       | No       | Primary key, auto-increment          |
| `name`              | varchar(255) | No       | The user's name                      |
| `email`             | varchar(255) | No       | Unique                               |
| `email_verified_at` | timestamp    | Yes      | When the email was verified          |
| `password`          | varchar(255) | No       | Hashed                               |
| `remember_token`    | varchar(100) | Yes      | Used for "remember me"               |
| `created_at`        | timestamp    | Yes      | Laravel timestamp                    |
| `updated_at`        | timestamp    | Yes      | Laravel timestamp                    |

**Relationships:** has many **projects** and **pets**.

**Factory:** `UserFactory` generates users with random names and emails.

**Seeder:** `UserSeeder` creates the main user from the `MAIN_USER_*` values in `.env` and stops with an error if the name, email or password is empty. In the local environment it also creates 5 random users each time it runs.

## Table: `projects`

| Column        | Type         | Nullable | Notes                                                   |
|---------------|--------------|:--------:|---------------------------------------------------------|
| `id`          | bigint       | No       | Primary key, auto-increment                             |
| `user_id`     | bigint       | No       | Foreign key → `users.id`, the owner of the project      |
| `name`        | varchar(255) | No       | Name of the project                                     |
| `slug`        | varchar(255) | No       | Unique, used in URLs                                    |
| `description` | text         | No       | What the project is about                               |
| `project_url` | varchar(255) | Yes      | Link to the live project                                |
| `github_url`  | varchar(255) | Yes      | Link to the repository                                  |
| `status`      | enum         | No       | `planned`, `in_progress`, `completed` or `archived`, defaults to `in_progress` |
| `created_at`  | timestamp    | Yes      | Laravel timestamp                                       |
| `updated_at`  | timestamp    | Yes      | Laravel timestamp                                       |

**Constraints:** `slug` is unique.

**Relationships:** belongs to one **user**, has many **documentation pages**.

**Factory:** `ProjectFactory` generates random projects for testing.

**Seeder:** `ProjectSeeder` reads `database/seeders/data/projects.json` and matches records by `slug`.

## Table: `documentation_pages`

| Column       | Type         | Nullable | Notes                                              |
|--------------|--------------|:--------:|----------------------------------------------------|
| `id`         | bigint       | No       | Primary key, auto-increment                        |
| `project_id` | bigint       | No       | Foreign key → `projects.id`                        |
| `title`      | varchar(255) | No       | Page title                                         |
| `slug`       | varchar(255) | No       | Identifies the page within its project             |
| `body`       | longtext     | No       | The page content, as markdown                      |
| `sort_order` | int unsigned | No       | Position of the page in the sidebar, defaults to `0`|
| `created_at` | timestamp    | Yes      | Laravel timestamp                                  |
| `updated_at` | timestamp    | Yes      | Laravel timestamp                                  |

**Constraints:** `slug` is unique within its project (`project_id` + `slug`), so two projects can each have a page called `introduction`.

**Relationships:** belongs to one project.

**Factory:** `DocumentationPageFactory` generates random pages for testing.

**Seeder:** `DocumentationPageSeeder` reads the markdown files in `database/seeders/data/documentation/`. The folder name must match a project slug, and the file name becomes the page `slug`. The front matter fills `title` (required) and `sort_order`. Pages are matched by project and slug, so running it again updates them. 

## Table: `pets`

| Column          | Type         | Nullable | Notes                                 |
|-----------------|--------------|:--------:|---------------------------------------|
| `id`            | bigint       | No       | Primary key, auto-increment           |
| `user_id`       | bigint       | No       | Foreign key → `users.id`              |
| `name`          | varchar(255) | No       | The pet's name                        |
| `slug`          | varchar(255) | No       | Unique, used in URLs                  |
| `species`       | varchar(255) | No       | For example cat                       |
| `bio`           | text         | Yes      | Short description                     |
| `profile_image` | varchar(255) | Yes      | Path to the profile image             |
| `created_at`    | timestamp    | Yes      | Laravel timestamp                     |
| `updated_at`    | timestamp    | Yes      | Laravel timestamp                     |

**Constraints:** `slug` is unique.

**Relationships:** belongs to one user.

**Factory:** `PetFactory` generates random pets for testing.

**Seeder:** none yet.

## Framework tables

Laravel creates a few more tables that the project doesn't use directly in its own code:

- `password_reset_tokens` and `sessions`: created together with `users`. Used by password reset and by database-backed sessions.
- `cache` and `cache_locks`: the database cache.
- `jobs`, `job_batches` and `failed_jobs`: the database queue.
- `personal_access_tokens`: API tokens from Laravel Sanctum.

## Decisions

- **Slugs are unique per project.** Documentation pages are identified by project and slug together, so different projects can reuse names like `introduction`.
- **Content is deleted along with its owner.** Foreign keys use cascade deletes, so there are no orphaned pages or pets.

