# PHP web application

A small PHP web application with pages and endpoints for user login, posts, and an administrative page. The repository also contains static assets, scripts, preview material, and a database connection helper.

## Main files

- `index.php`, `home.php` — application pages
- `login.php` — login page
- `post.php` — post-related page
- `admin.php` — administrative page
- `api/` — login, logout, and post endpoints
- `DBConnection.php` — database connection helper
- `static/`, `script/`, `preview/` — supporting frontend assets

## Running locally

This project requires PHP and a web server configured to serve the repository. Configure the database connection for your environment before use; consult `DBConnection.php` and the project configuration.

For example, with PHP's built-in development server:

```bash
php -S localhost:8000
```

Then open `http://localhost:8000` in a browser. Database-backed features require a compatible database and matching local configuration.

## Note

This is a compact PHP project. Review and configure authentication, authorization, and database settings appropriately before exposing it to a network or using real user data.
