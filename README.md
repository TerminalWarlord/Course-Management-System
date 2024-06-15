# Course Management System

## Introduction

The Course Management System is designed to manage users, departments, courses, and sessions effectively. It includes functionalities for Super Admins, Department Admins, Teachers, and Students. This system is divided into two main projects:

-   **Project 10**: User Management, Registration, and Login
-   **Project 11**: Course Management

This was a project for my Software Development course.

## Table of Contents

-   [Introduction](#introduction)
-   [Features](#features)
    -   [Super Admin](#super-admin)
    -   [Department Admin](#department-admin)
    -   [Teacher](#teacher)
    -   [Student](#student)
-   [Installation](#installation)
-   [Usage](#usage)
-   [License](#license)

## Features

### Project 10: User Management, Registration, and Login

#### Super Admin

-   **CRUD Departments**: Create, Read, Update, Delete departments.
-   **CRUD Department Admins**: Manage department admins.
-   **View Course Profiles**: View course profiles for each department or courses.

#### Department Admin

-   **CRUD Versions and Courses**: Manage versions and courses under each version.
-   **CRUD Program Outcomes (PO)**: Manage program outcomes for each department (e.g., Engineering programs with 12 outcomes).
-   **Create Course Profiles**: Manage course objectives, rationale, outcomes, descriptions, and map course outcomes with program outcomes.

### Project 11: Course Management

#### Department Admin

-   **CRUD Sessions**: Manage sessions and create sections for courses.
-   **Assign Course Teachers**: Assign teachers to sections.

#### Teacher

-   **View Course Profiles**: View course profiles for assigned courses.
-   **Create Lesson Plans**: Create lesson plans and topics for 13 weeks.

#### Student

-   **View Enrolled Courses**: View enrolled courses.
-   **View Lesson Plans**: View lesson plans for selected courses.

## Installation

1. Clone the repository:

    ```sh
    git clone https://github.com/TerminalWarlord/Course-Management-System.git
    cd Course-Management-System
    ```

2. Install dependencies:

    ```sh
    composer install
    npm install
    ```

3. Copy the `.env.example` file to `.env` and configure your environment variables:

    ```sh
    cp .env.example .env
    ```

4. Generate an application key:

    ```sh
    php artisan key:generate
    ```

5. Run the database migrations:

    ```sh
    php artisan migrate
    ```

6. Seed the database with initial data (including a Super Admin user):

    ```sh
    php artisan db:seed
    ```

7. Run the development server:
    ```sh
    php artisan serve
    ```

## Usage

-   **Login**: Use the login page to sign in as a Super Admin or Department Admin.
-   **Manage Departments and Users**: Super Admins can manage departments and department admins.
-   **Manage Courses and Sessions**: Department
