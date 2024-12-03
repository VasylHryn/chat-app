# Chat Application

A simple chat application built using **Laravel** and **TailwindCSS**. It supports user authentication, text messaging, and image uploads.

## Current Look
![{A0E5FAC9-D1E9-4628-A185-37410C3D320B}](https://github.com/user-attachments/assets/0c432097-0423-4ae8-9f1b-bfff97c1b4a8)

## Features

- 📧 User authentication (registration and login)
- 💬 Send and receive text messages
- 📷 Upload and display images in messages
- 🗂 View all messages in the chat history

## Technologies Used

- **Backend**: Laravel 10
- **Frontend**: TailwindCSS
- **Database**: MySQL

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/chat-application.git
   cd chat-application

2. Install PHP dependencies:
   ```bash
   composer install

3. Install JavaScript dependencies:
   ```bash
   npm install

4. Set up the .env file:
   ```bash
   cp .env.example .env
   php artisan key:generate

5. Configure database settings in the .env file.

6. Run database migrations:
   ```bash
   php artisan migrate

7. Build frontend assets:
   ```bash
   npm run dev

8. Start the server:
   ```bash
   php artisan serve

9. Open the application in your browser at http://127.0.0.1:8000.
