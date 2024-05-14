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
#### Composer livewire dependencies
```sh
composer require laravel/jetstream
```
#### NPM dependencies
```sh
npm install
```
#### Run any necessary NPM
```sh
npm run dev
```
#### Migrate database
```sh
php artisan migrate
```
<p>Otherwise export database file to mysql database.</p>
<p>If you RUN the migrations and created tables using artisan commands, you must update the user role as

#### Run this script for import drug data into database
```
INSERT INTO drugs (drugname, priceperone, quantity) VALUES
('Paracetamol', 2.5, 100),
('Aspirin', 1.8, 80),
('Ibuprofen', 3.2, 90),
('Omeprazole', 5.5, 70),
('Lisinopril', 4.0, 60),
('Simvastatin', 6.3, 50),
('Metformin', 3.8, 40),
('Atorvastatin', 7.2, 30),
('Levothyroxine', 2.0, 20),
('Amoxicillin', 2.9, 10),
('Prednisone', 4.5, 80),
('Metoprolol', 3.6, 70),
('Amlodipine', 5.8, 60),
('Hydrochlorothiazide', 4.2, 50),
('Albuterol', 6.7, 40),
('Furosemide', 3.4, 30),
('Hydrocodone', 7.1, 20),
('Loratadine', 2.3, 10),
('Montelukast', 3.9, 90),
('Fluticasone', 5.6, 80),
('Clopidogrel', 4.8, 70),
('Cetirizine', 6.2, 60),
('Escitalopram', 3.7, 50),
('Azithromycin', 7.3, 40),
('Tramadol', 4.1, 30);
```

**pharmacist** in user table related to pharmacist users.
</p>

#### Run Application
```sh
php artisan serve
```
