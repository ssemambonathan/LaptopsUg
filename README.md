# LaptopsUg

A small PHP storefront for browsing laptop listings in Uganda. The project was upgraded from a static demo into a more maintainable, login-ready prototype with a clearer structure, secure password handling, and improved styling.

## Features

- Laptop listing from XML data
- Responsive storefront design
- Registration and login flow
- Session-based user dashboard
- Secure password hashing with `password_hash()`
- Simple fallback file-based user storage for demo purposes
- Case-safe XML loading so the app works across different server environments

## Project structure

- `index.php` — homepage and laptop listing
- `login.php` — login form
- `register.php` — registration form
- `dashboard.php` — authenticated user screen
- `login_process.php` — login logic
- `register_process.php` — registration logic
- `logout.php` — logout handling
- `auth.php` — reusable auth and path helpers
- `style.css` — updated styling
- `Laptops.xml` — product catalog

## Requirements

- PHP 8.0 or newer
- A local web server such as Apache or PHP development server

## Run locally

```bash
php -S localhost:8000
```

Then open:

```text
http://localhost:8000/index.php
```

## Notes

This is still a lightweight demo and is intentionally simple for easy extension. You can later replace the file-based user storage with MySQL or PostgreSQL and add cart, order, and admin features.
