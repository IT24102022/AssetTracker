<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Asset Tracker

A web-based **Internal Asset & Equipment Tracker** built with **Laravel 13**, **MySQL**, **Blade**, and **Tailwind CSS**.

This application allows administrators to manage company assets, employees, asset assignments, QR code tracking, email notifications, Excel exports, and a REST API.

The project was developed as part of a **Software Engineering Internship Technical Assessment**.

---

# Features

## Authentication

- Laravel Breeze Authentication
- Secure Admin Login & Logout
- Protected Management Routes using Authentication Middleware

---

## Dashboard

- Total Assets
- Available Assets
- Assigned Assets
- Assets in Maintenance
- Total Employees
- Total Categories
- Recent Asset Assignments

---

## Category Management

- Create Categories
- Edit Categories
- Delete Categories
- View Categories

---

## Employee Management

- Create Employees
- Edit Employees
- Delete Employees
- Active / Inactive Employee Management

---

## Asset Management

- Create Assets
- Edit Assets
- Delete Assets
- Category Assignment
- Purchase Information
- Asset Status Management

### Search & Filter

Search assets by:

- Asset Code
- Asset Name
- Serial Number

Filter assets by:

- Category
- Status

---

## Asset Assignment

- Assign Assets to Employees
- Return Assigned Assets
- Prevent Double Assignment
- Assignment History
- Automatic Status Updates

Business Rules

- Assigned assets cannot be assigned again.
- Assets under Maintenance cannot be assigned.
- Only Active employees can receive assets.

---

## QR Code Integration (Bonus)

Every asset automatically has its own QR Code.

Features:

- Generate QR Code
- Download QR Code (SVG)
- Scan QR Code using a Mobile Phone
- View Asset Details through a Public Asset Details Page

**Alternative QR Scanning Method**

If a mobile device is not available, the QR code can also be scanned using **Google Lens** in the Google Chrome browser.

Steps:

1. Right-click the displayed QR code.
2. Select **Search Image with Google Lens**.
3. Google Lens will detect the QR code and display the encoded URL.
4. Open the detected link to access the Asset Details page.

This provides a convenient way to test the QR code functionality directly on a desktop computer without requiring a physical mobile device.

---

## Email Notifications (Bonus)

When an asset is assigned:

- Employee automatically receives an email notification.
- Implemented using Laravel Mail.
- Tested using Mailtrap SMTP.

---

## Excel Export (Bonus)

Export the following reports:

- Asset List
- Assignment History

Export format:

- Microsoft Excel (.xlsx)

---

## REST API (Bonus)

Available Assets API

```
GET /api/v1/assets
```

Returns a paginated JSON list of available assets.

Example Response

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "asset_code": "AST1001",
            "name": "Dell Latitude",
            "status": "Available"
        }
    ]
}
```

---

# Technology Stack

| Layer | Technology |
|--------|------------|
| Backend | Laravel 13 |
| Language | PHP 8.3 |
| Database | MySQL |
| Frontend | Blade + Tailwind CSS |
| Authentication | Laravel Breeze |
| QR Code | simplesoftwareio/simple-qrcode |
| Excel Export | maatwebsite/excel |
| Mail | Mailtrap SMTP |

---

# Prerequisites

Before running this project, install:

- PHP 8.3 or later
- Composer
- Node.js & npm
- MySQL (or MariaDB)
- Git

---

# Installation

## Clone the Repository

```bash
git clone https://github.com/IT24102022/AssetTracker.git
```

Enter the project directory

```bash
cd AssetTracker
```

---

## Install Dependencies

Install PHP packages

```bash
composer install
```

Install JavaScript packages

```bash
npm install
```

---

## Configure Environment

Copy the environment file

```bash
cp .env.example .env
```

Generate the application key

```bash
php artisan key:generate
```

---

# Database Configuration

Create a MySQL database named:

```
asset_tracker
```

Update your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=asset_tracker
DB_USERNAME=root
DB_PASSWORD=
```

---

# Seed Sample Data

Run:

```bash
php artisan migrate:fresh --seed
```

This command automatically creates:

- Administrator Account
- Sample Categories
- Sample Employees
- Sample Assets

---

# Demo Login Credentials

Email

```
admin@example.com
```

Password

```
password123
```

> **Note:** Change the password before deploying the application to a public environment.

---

# Build Frontend Assets

Production build

```bash
npm run build
```

Development

```bash
npm run dev
```

---

# Run the Application

Start Laravel

```bash
php artisan serve
```

Open

```
http://127.0.0.1:8000
```

Login using the demo administrator credentials.

---

# Mailtrap Setup (Email Notifications)

This project uses **Mailtrap Sandbox** for testing email notifications.

## Step 1

Create a free account

https://mailtrap.io

---

## Step 2

Navigate to

```
Email Testing
→ Inboxes
→ My Inbox
```

---

## Step 3

Open

```
SMTP Settings
```

Choose

```
Laravel 9+
```

Mailtrap will generate SMTP credentials.

---

## Step 4

Update your `.env`

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=YOUR_MAILTRAP_USERNAME
MAIL_PASSWORD=YOUR_MAILTRAP_PASSWORD
MAIL_ENCRYPTION=tls

MAIL_FROM_ADDRESS="assets@assettracker.test"
MAIL_FROM_NAME="${APP_NAME}"
```

---

## Step 5

Clear Laravel configuration

```bash
php artisan config:clear
```

---

## Step 6

Assign an asset to an employee using the Asset Assignment page.

The notification email will appear inside your Mailtrap Inbox.

---

# Testing QR Codes on Mobile (ngrok)

QR Codes contain a URL pointing to the public Asset Details page.

Since mobile devices cannot access your local computer through `127.0.0.1`, use **ngrok** to expose your local Laravel server.

---

## Step 1

Download ngrok

https://ngrok.com/download

---

## Step 2

Authenticate ngrok

```bash
ngrok config add-authtoken YOUR_AUTH_TOKEN
```

---

## Step 3

Start Laravel

```bash
php artisan serve
```

---

## Step 4

Start ngrok

Open another terminal

```bash
ngrok http 8000
```

Example output

```
Forwarding

https://abcd1234.ngrok-free.app
```

---

## Step 5

Update your `.env`

Replace

```env
APP_URL=http://127.0.0.1:8000
```

with

```env
APP_URL=https://abcd1234.ngrok-free.app
```

Replace the URL with your own ngrok forwarding address.

---

## Step 6

Clear Laravel configuration

```bash
php artisan config:clear
```

---

## Step 7

Generate the QR Code again.

The QR code will now encode the ngrok URL instead of localhost.

Now scan the QR code using your mobile phone.

The Asset Details page will open without requiring login.

> **Important:** Free ngrok URLs change every time ngrok restarts. If the URL changes, update `APP_URL`, clear the config cache, and regenerate the QR code.

---

# REST API

Endpoint

```
GET /api/v1/assets
```

Example

```
http://127.0.0.1:8000/api/v1/assets
```

Returns a paginated JSON list of available assets.

---

# Useful Routes

| Route | Description |
|--------|-------------|
| /dashboard | Dashboard |
| /categories | Category Management |
| /employees | Employee Management |
| /assets | Asset Management |
| /asset-assignments | Asset Assignment |
| /assignment-history | Assignment History |
| /export/assets | Export Assets to Excel |
| /export/assignment-history | Export Assignment History |
| /asset-info/{asset} | Public Asset Details Page |
| /asset-info/{asset}/qr | View QR Code |
| /asset-info/{asset}/download | Download QR Code |
| GET /api/v1/assets | Available Assets API |

---

# Validation Rules

- Asset Code must be unique.
- Serial Number must be unique.
- Employee Email must be unique.
- Purchase Date cannot be a future date.
- Only active employees can receive assets.
- Assigned or Maintenance assets cannot be reassigned.

---

# Database Structure

- Users
- Categories
- Employees
- Assets
- Asset Assignments

---

# Seeders

Included:

- AdminSeeder
- CategorySeeder
- EmployeeSeeder
- AssetSeeder

---

# Factories

Included:

- CategoryFactory
- EmployeeFactory
- AssetFactory

---

# Bonus Features Implemented

- Excel Export
- QR Code Generation
- Mobile QR Scanning
- Email Notifications (Mailtrap)
- REST API
- Database Seeders
- Model Factories


---


# Future Improvements

- Role-Based Access Control
- Asset Images
- Maintenance Scheduling
- Dashboard Charts
- Barcode Support
- PDF Reports
- Audit Logs

---

# Author

**Miran Ravisara**

Software Engineering Undergraduate

GitHub

https://github.com/IT24102022

---

# License

This project was developed for educational purposes as part of a Software Engineering Internship Technical Assessment.
