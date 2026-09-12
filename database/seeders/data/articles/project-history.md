---
title: "Designing a Multimedia Project History"
slug: "designing-a-multimedia-project-history"
excerpt: "Why a-mamal.dev's project history is being designed as a multimedia timeline."
status: "published"
published_at: 2026-09-12
---

# Designing a Multimedia Project History

As a-mamal.dev continues to evolve, I wanted to document more than its current state. I also wanted to preserve the process behind it: the design changes, architectural decisions, experiments, and iterations that shaped the project over time.

This led to the idea of a visual project history presented as a timeline.

## From a Changelog to a Visual History

A conventional changelog is useful for recording changes, but it does not necessarily communicate how a project evolved visually or why particular decisions were made.

The history feature is therefore being designed as a timeline of meaningful milestones rather than a list of Git commits.

Each milestone can describe:

- what changed
- when it changed
- why the change was made
- how the project looked at that point
- supporting visual or interactive material

The goal is to preserve the story of the project, not every individual implementation detail.

## History Entries

The planned Project History system is built around meaningful milestones in a project's development.

A history entry can contain information such as:

- title
- date
- summary
- detailed content
- associated media

For example, an entry might document the introduction of the Documentation section, a major CSS refactor, or a change in the project's content architecture.

The history therefore becomes a layer above the individual commits: Git records the implementation history, while the timeline records the significant milestones worth explaining to a visitor.

## Supporting Multiple Types of Media

A history entry should not be limited to a single screenshot.

A development milestone may be better represented by several pieces of media:

- screenshots
- GIFs
- short videos
- external video links
- future media types that may become useful

For example, a single entry could contain two screenshots followed by a GIF demonstrating an interaction.

A history entry is designed to support multiple media items that can be presented in a defined order.

This keeps the history entry focused on the milestone itself while allowing its supporting media to grow independently.

Currently, the history media is organized as files within `public/history-media`, grouped by project and page. Where useful, the structure can later be extended to organize media by feature as well. This keeps the initial implementation simple while providing a consistent way to organize the historical visuals.

## Why Organize Media This Way?

The `history-media` directory follows the structure of the projects and pages being documented. For a-mamal.dev, media is organized into areas such as the home page, about page, articles, documentation, lab, and projects. Documentation can then be further organized by the project being documented, such as a-mamal.com or a-mamal.dev.

This makes historical visuals easier to find and keeps media associated with the part of the project it represents. It also leaves room for the history to grow without placing every screenshot, GIF, or video into a single directory.

The structure can therefore be thought of as:

history-media/
├── a-mamal-com/
│   └── ...
└── a-mamal-dev/
    ├── about/
    ├── article/
    ├── articles/
    ├── documentation/
    │   ├── a-mamal-com/
    │   └── a-mamal-dev/
    ├── home/
    ├── lab/
    └── projects/

The goal is not to create a complicated asset management system. The filesystem provides a simple and understandable way to organize the media while the project is still relatively small.

If the history system becomes more complex in the future, the way media is associated with individual milestones could also evolve. A database-backed approach could eventually make it easier to manage relationships, ordering, captions, and additional metadata.

## Preserving the Project's Evolution

Project History is intended to complement the rest of the site's documentation.

The documentation can explain how a feature works, while the history can show how the project arrived there.

Together, they provide both the current state of the project and the decisions and iterations that shaped it.

For a project that is continuously evolving, that history is part of the documentation too.