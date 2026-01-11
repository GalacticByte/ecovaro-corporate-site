# Ecovaro Corporate Site

## Project Type

**Portfolio Project**

## Live Demo

[👉 View Live Demo](https://ecovaro-demo-website.42web.io/ecovaro/)

## Description

This is a fictional corporate website built as a WordPress custom theme.
It is designed for portfolio purposes and showcases a professional corporate layout. The theme leverages **Carbon Fields** as a custom fields solution.

## Tech Stack

-   **Core:** WordPress 6.x, PHP 8+
-   **Frontend:** HTML5, SCSS (Sass), JavaScript (ES6+), jQuery
-   **Dependency Management:** Composer (PHP), NPM (Assets)
-   **Custom Fields:** Carbon Fields (Code-first approach)
-   **Forms:** Contact Form 7 (Programmatic integration)

## Key Features

-   **Custom Post Type:** Job Offers (Oferty Pracy) with dedicated archive and single views.
-   **Theme Options:** Global settings for logos, footer content, and social media links managed via Carbon Fields.
-   **Modular Layouts:** Flexible content blocks (e.g., Hero, Text & Image) defined in PHP.
-   **Security:** Restricted access to application forms and disabled Gutenberg for specific post types to maintain design integrity.
-   **Dynamic Forms:** Custom integration with **Contact Form 7**, featuring programmatic value injection (auto-filling job titles) and strict HTML output control.

## Why Carbon Fields?

The decision to use Carbon Fields instead of **ACF Free** was driven by the following factors:

-   **Advanced field types**: Carbon Fields provides fields like tabs, complex containers, and repeatable groups which are not available in ACF Free.
-   **Fully open-source**: No licensing restrictions.
-   **Portfolio clarity**: Demonstrates ability to implement a flexible CMS system using a less common but fully functional alternative to ACF Pro.

Using Carbon Fields allowed creating a fully customizable, modular content architecture while staying within free tools.

> ⚠️ In a commercial project, ACF Pro would be the natural choice due to its widespread adoption and advanced features.
> Carbon Fields was chosen here to ensure the repository remains fully open-source and runnable by anyone without requiring a paid license key, while still demonstrating a professional "code-first" approach to custom fields.

## Installation / Setup

> ⚠️ Note: This repository does not include a database. To run locally, you will need a WordPress environment (e.g., Local by Flywheel, XAMPP, MAMP).

### Step 1 – PHP dependencies

Install Carbon Fields and its dependencies:

```bash
composer install
```

This will install Carbon Fields and its dependencies.

### Step 2 – Frontend dependencies

Install Sass and other frontend build tools:

```bash
npm install
```

### Step 3 – Compile assets & Development

To compile minified CSS for production:

```bash
npm run build
```

To watch for changes in SCSS files during development (live compilation):

```bash
npm run watch:sass
```

### Step 4 – Activate theme

1. Copy the theme folder to `wp-content/themes/`.
2. Activate the theme in the WordPress admin panel.

### Step 5 – Demo content (optional)

Since this is a portfolio project, demo content is not included. Pages, posts, and media need to be created manually to see the theme in action.

## Notes

-   All content (company, contacts, images) is fictional.
-   Forms are disabled for sending emails; any submission will show a demo message.
