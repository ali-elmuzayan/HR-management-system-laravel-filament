# HRMS - Human Resource Management System

[![Latest Version on Packagist](https://img.shields.io/packagist/v/your-vendor/your-repo.svg?style=flat-square)](https://packagist.org/packages/your-vendor/your-repo)
[![Total Downloads](https://img.shields.io/packagist/dt/your-vendor/your-repo.svg?style=flat-square)](https://packagist.org/packages/your-vendor/your-repo)
[![License](https://img.shields.io/packagist/l/your-vendor/your-repo.svg?style=flat-square)](https://packagist.org/packages/your-vendor/your-repo)

A comprehensive HR management solution built with Laravel and Filament PHP. Features include employee management, attendance tracking, leave management, payroll processing, performance reviews, and document management with role-based access control.

## Features

-   **Employee Management:** Centralized database for all employee information, including personal details, job roles, and contact information.
-   **Attendance & Time Tracking:** Automated system for tracking employee attendance, work hours, and overtime.
-   **Leave Management:** Streamlined workflow for leave requests and approvals, with customizable leave types.
-   **Payroll Processing:** Automated payroll calculations, including salary, bonuses, deductions, and tax compliance.
-   **Performance Reviews:** Tools for setting goals, conducting performance appraisals, and providing feedback.
-   **Document Management:** Secure storage and easy access to HR documents, such as contracts, policies, and employee records.
-   **Role-Based Access Control:** Pre-defined roles (Admin, HR, Manager, Employee) with specific permissions to ensure data security.
-   **Reporting & Analytics:** Insightful dashboards and reports to monitor key HR metrics and trends.

## Tech Stack

-   **Backend:** Laravel 12+, Livewire
-   **Frontend:** Alpine.js, Tailwind CSS
-   **Admin Panel:** Filament PHP
-   **Database:** MySQL / PostgreSQL

## Getting Started

### Prerequisites

-   PHP 8.2+
-   Composer
-   Node.js & NPM
-   MySQL or PostgreSQL

### Installation

1.  **Clone the repository:**

    ```bash
    git clone https://github.com/ali-elmuzayan/HR-management-system-laravel-filament.git
    cd HR-management-system-laravel-filament
    ```

2.  **Install dependencies:**

    ```bash
    composer install
    npm install
    ```

3.  **Set up your environment:**

    ```bash
    cp .env.example .env
    ```

    _Update your `.env` file with your database credentials and other settings._

4.  **Generate application key:**

    ```bash
    php artisan key:generate
    ```

5.  **Run database migrations and seeders:**

    ```bash
    php artisan migrate --seed
    ```

6.  **Build frontend assets:**

    ```bash
    npm run dev
    ```

7.  **Start the development server:**
    ```bash
    php artisan serve
    ```

## Usage

-   **Admin Login:** Access the Filament admin panel at `/admin`.
    -   **Default Admin:** `admin@example.com`
    -   **Password:** `password`
-   **Employee Login:** Access the employee portal at `/login`.

## Contributing

Contributions are welcome! Please follow these steps:

1.  Fork the repository.
2.  Create a new branch (`git checkout -b feature/your-feature-name`).
3.  Make your changes.
4.  Commit your changes (`git commit -m 'Add some feature'`).
5.  Push to the branch (`git push origin feature/your-feature-name`).
6.  Open a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
