---
title: Contributing
order: 4
---

## Ways to contribute

You can pick up one of the existing [issues](https://github.com/a-mamal/a-mamal-dev/issues), check the [project board](https://github.com/users/a-mamal/projects/6), or open a new issue yourself.

Contributions can be about:

- Appearance, organisation or wording
- Accessibility
- Fixing a typo or an unclear sentence in the documentation
- Reporting a bug
- Working on a code change

We are all learning here, so even sharing your thoughts is valuable on its own.

### One rule

Racism, ableism, sexism and other discrimination or harassment are not tolerated. We're all learning and doing our best, but this isn't the place for hate.

### For newcomers

You don't need to write code or be an expert to help. If this is your first time using GitHub, your contribution still means a lot to me. I'll always try to keep a few [good first issues](https://github.com/a-mamal/a-mamal-dev/issues?q=is%3Aissue+state%3Aopen+label%3A%22good+first+issue%22) open and you too can open an issue if you spot something. You've got this!

## Before you begin

1. Set up the project by following [Getting started](getting-started).
2. For anything bigger than a small fix you can open an issue first so we can talk about it before you spend time on it.

## Making a change

1. Fork the repository and create a branch for your change.
2. Keep the change small and focused on one thing.
3. Run the project locally and check that your change works.

## Branch names and commits

Branches start with a prefix that says what kind of change it is, for example `feat/...` or `docs/...`.

There's an effort to keep commits organised with the following format:

```text
type(scope): message
```

Examples:

```text
feat: add documentation endpoints
fix: handle a missing project slug
content(documentation): add architecture page for a-mamal-dev
```

The types used so far:

- `feat`: a new feature
- `fix`: a bug fix
- `docs`: changes to documentation in the repository, such as the README
- `content`: changes to written content such as the documentation pages
- `style`: visual styling that doesn't change behaviour
- `refactor`: restructuring code without changing what it does
- `chore`: maintenance, such as dependencies and setup
- `ci`: build and deployment workflows

The scope says which part of the project the change touches, for example `sidebar`, `api` or `seed`. The list of scopes grows with the project, so pick the one that fits best, or look at the commit history for examples.

## Opening a pull request

- Keep pull requests small, so they are quick to review.
- Describe what changed and why.
- Link the issue it relates to, if there is one.
- I review and merge every pull request myself, so it may take a little while before you get a reply. Thank you for your patience!

## Accessibility

The project is still in its early stages, but I keep accessibility in mind while I build, and it isn't an afterthough in my book.

I test as I go, but I can only see things from my own perspective. If you find something that causes a problem or could be done better, that's extremely useful and appreciated.

You don't have to be a developer for this. Just letting me know helps make this a better place for everyone.

## Editing documentation

Documentation pages are markdown files in `backend/database/seeders/data/documentation/{project-slug}/`. Each file starts with front matter:

```markdown
---
title: Page title
order: 0
---
```

The file name is the page's slug, so avoid renaming files. After editing, run `php artisan db:seed` from the `backend` folder to see the change locally.