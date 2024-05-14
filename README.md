<p align="center"><img src="public/icons/pharmacy.gif" width="400" alt="Company logo"></p>

<p align="center">
    User | Pharmacist
</p>

<h1 align="center">PHP Practical Exam</h1>

## About the system
# Medical Prescription Upload System

This is a simple solution for medical prescription upload with two user levels: User and Pharmacy. It allows users to register, login, upload prescriptions, and receive quotations from pharmacies. Pharmacies can view uploaded prescriptions, prepare quotations, and receive email notifications about user responses.

## Table of Contents

- [Features](#features)
- [Usage](#usage)
- [Technologies Used](#technologies-used)
- [Setup](#setup)

## Features

### Part A: User

1. **User Registration**: Users can register with their name, email, address, contact number, and date of birth.
2. **User Login**: Registered users can log in to their accounts securely.
3. **Upload Prescription**: Users can upload prescriptions, including up to 5 images, notes, delivery address, and preferred delivery time slots (2-hour intervals).

### Part B: Pharmacy

1. **View Prescriptions**: Pharmacy users can view uploaded prescriptions from users.
2. **Prepare Quotations**: Pharmacies can prepare quotations for uploaded prescriptions.
3. **Send Quotation to User**: Quotations are sent to users and displayed in their accounts. Users receive email notifications about the quotations.
4. **User Response**: Users can accept or reject quotations.
5. **Notify Pharmacy**: Pharmacies receive notifications about user responses to quotations.

## Usage

1. Access the application in your web browser.
2. Register as a user or pharmacy user.
3. Log in to your account.
4. Upload prescriptions (users) or view prescriptions and prepare quotations (pharmacies).
5. Send and respond to quotations.

## Technologies Used

- Laravel 11.0
- MySQL
- PHPMailer - for email notifications
- Bootstrap - for frontend styling

## Pharmacist login credentials
### User 01
User's name: Thirasara Liyanage
User's email: thirasara@gmail.com
User's password: thirasa123

### User 02
User's name: Bhashitha Kaveesh
User's email: kaveesh@gmail.com
User's password: kaveesh123


## Setup
1. Clone the repository / Extract zip file
2. Navigate to the project directory or open project with proper IDE
3. Install dependencies (Composer dependencies, Node modules, livewire compenents)

### Composer dependencies
```sh
composer install
```
### Composer livewire dependencies
```sh
composer require laravel/jetstream
```
### NPM dependencies
```sh
npm install
```
### Run any necessary NPM
```sh
npm run dev
```
### Migrate database
```sh
php artisan migrate
```

### Run Application
```sh
php artisan serve
```