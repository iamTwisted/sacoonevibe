
# Sacco Management System

## Overview

A comprehensive Sacco (Savings and Credit Cooperative Organization) management system designed to streamline member management, financial transactions, and administrative tasks. This application provides a secure and efficient platform for Saccos to manage their operations, enhance member services, and ensure financial transparency.

## Features

*   **Member Management:** Register new members with a multi-step form, manage member profiles, and view a list of all members. Includes functionality for activating, suspending, and terminating memberships.
*   **Role-Based Access Control (RBAC):** A robust RBAC system to control user access to different parts of the application.
    *   **Permissions:** Granular permissions for creating, viewing, editing, and deleting users, roles, and other resources.
    *   **Roles:** Roles that group permissions together, such as 'admin', 'manager', and 'member'.
    *   **Admin User:** An admin user with all permissions.
*   **Loan Management:** Streamline the entire loan lifecycle, from application and appraisal to disbursement and repayment.
*   **Loan Type Management:** Create, edit, and delete different types of loans with varying interest rates and repayment periods.
*   **Reporting & Analytics:** (Future Feature) Generate insightful reports on financial performance, member activity, and other key metrics.

## Design & Style

*   **Frontend:** The application uses a clean and modern user interface built with Blade templates and Bootstrap.
*   **Backend:** The backend is powered by Laravel, following the MVC architecture for a robust and scalable application.
*   **Database:** The system uses a relational database to store and manage all data, with a well-defined schema to ensure data integrity.

## Current Task: Implement Loan and Loan Type Management

**Objective:** Implement functionality to manage loans and loan types.

**Steps:**

1.  [x] Create `Loan` and `LoanType` models and migrations.
2.  [x] Create `LoanController` and `LoanTypeController`.
3.  [x] Add routes for `Loan` and `LoanType` resources.
4.  [x] Create views for `Loan` and `LoanType` CRUD operations.
5.  [x] Implement logic in the controllers to handle CRUD operations.
