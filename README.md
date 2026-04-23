# a-mamal-dev 🧪

[![Laravel](https://img.shields.io/badge/Laravel-13.x-red?style=for-the-badge&logo=laravel)]()
[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php)]()
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)]()
[![Status](https://img.shields.io/badge/Status-Active%20Experimentation-brightgreen?style=for-the-badge)]()

---

## 🧪 Overview

A personal **development laboratory** where ideas, UI experiments, and concepts come to life.

This is not a finished product.

It is a space for:
- experimenting both with Laravel features and other languages and frameworks
- raw ideas
- testing UI/UX ideas
- building small reusable modules
- exploring and implementing creative ideas
- turning sketches → code → systems
- articles and explanations about exploration and evolution 

---

## 🧠 Philosophy

> Build. Break. Learn. Repeat.

This project is intentionally going to be:
- unfinished by design
- constantly evolving
- used for experimentation over perfection

---

## 🌐 Relationship to a-mamal.com

- **a-mamal.com** → structured personal website
- **a-mamal-dev** → experimental development environment

They are connected, but serve different purposes:
Although both are open to learning and evolving,
- one presents
- one explores

In the beginning, both may look similar in UI and structure, but they diverge in intent: one focuses on clarity and presentation, the other on iteration, experimentation, and evolving ideas.
a-mamal.dev allows for raw sketches and early-stage thinking, capturing the full journey of creation, from initial idea to finished form (if there is one).

---

## ⚙️ Tech Stack

- Laravel (Blade, Eloquent)
- PHP 8.x
- MariaDB

---

## 🧪 What’s Inside (now + evolving)

- Laravel authentication (Breeze installed / in progress)
- UI experiments and layout testing
- Component-based Blade structure
- Personal idea sketches turned into features
- Small prototype systems

---

## 🚧 Current Focus

- Laravel Breeze integration
- Base UI system setup
- Experiment-friendly folder structure
- Initial “idea-to-feature” pipeline

---

## 🧭 Future Ideas

- creative experiments section (mini apps inside the app)
- sketch → UI → component workflow
- public user contributions (later stage)
- interactive dev journal / bullet journal system
- modular plugin-like feature structure

---

## 🤝 Learning in Public

This project is part of my learning journey.

Mistakes, experiments, and unfinished ideas are expected.

If you’re here:
- feel free to explore
- open issues with suggestions
- or just watch things evolve

---

## 🚀 Deployment

- [GitHub Actions](https://github.com/features/actions)
- [shivammathur/setup-php](https://github.com/shivammathur/setup-php)
- [SamKirkland/web-deploy@v1](https://github.com/SamKirkland/web-deploy)

## ⚙️ Deployment Flow

Every push to the `main` branch triggers an automated CI/CD pipeline via GitHub Actions.

The process works as follows:

1. 📥 **Checkout Code**
   - The latest version of the repository is pulled.

2. 🐘 **Setup PHP**
   - PHP 8.4 environment is configured for Laravel execution using `shivammathur/setup-php@v2`.

3. 📦 **Install Backend Dependencies**
   - Composer installs production PHP dependencies.

4. 🟢 **Setup Node.js**
   - Node.js 20 is installed to support frontend tooling.

5. 📦 **Install Frontend Dependencies**
   - npm installs Vite and related build tools.

6. ⚙️ **Build Assets**
   - Vite compiles CSS and JavaScript.
   - Generates optimized production files in `public/build/`.
   - Creates `manifest.json` for Laravel asset mapping.

7. 🚀 **Deploy Application**
   - Laravel backend files are deployed to `/domains/a-mamal.dev/`
   - Public-facing files are deployed to `/public_html/`
   - Server is updated with the latest build.

8. 🌐 **Live Site Update**
   - The production site reflects the latest commit automatically.

---

## 📜 License

MIT — use freely, modify freely, learn freely.

---

## ⚠️ Note

This is a **developer sandbox**, not a production-ready system.

Things will change. Often.
