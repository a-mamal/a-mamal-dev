---
title: Architecture
order: 2
---

## Overview

a-mamal.dev is one repository that holds two applications. They talk to each other over HTTP.

- **Frontend** at a-mamal.dev: built with React, TypeScript and Vite. It shows the pages to visitors.
- **Backend** at api.a-mamal.dev: a Laravel API with a MariaDB database. It stores the data and serves it as JSON.

## How content gets to the page

1. **Content lives in the repository.**
    Projects are described in `projects.json`, and documentation pages are markdown files in `backend/database/seeders/data/documentation/{project-slug}/{page-slug}.md`.

2. **Seeders load it into the database.**
    - `ProjectSeeder` fills the `projects` table, and
    - `DocumentationPageSeeder` fills the `documentation_pages` table.

    Both match records by slug, so running them again updates existing entries instead of duplicating them.

3. **The API serves it as JSON.**
    The projects endpoint is working already.

4. **The frontend fetches and displays it.**

## Why it works this way

- **Markdown files in the repo.** Anyone can fix a typo from GitHub without setting anything up, and every change shows up in a pull request.
- **A database behind the API.** Projects and pages are related through a `project_id`, so "all pages for this project, in order" is a single query.
- **Public data.** Project data and documentation are tracked in the repository on purpose, so anyone can read them and propose fixes.

## Where things live

- `backend/`: the Laravel API.
- `backend/database/seeders/data/`: the content the seeders read.
- `frontend/`: the React app.