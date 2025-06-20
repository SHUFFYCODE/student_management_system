# Student Management System – CodeIgniter 4

This is a full-featured web-based Student Management System built using CodeIgniter 4 and MySQL. It allows admins to manage student records, upload student images, monitor attendance and grades, and perform secure login/logout with role-based access. The system includes validation, search/filter functionality, and supports local or Docker-based deployment.

## Features

- User Registration and Login
- Admin/User Role-based Access
- Create, Read, Update, Delete (CRUD) for Students
- Upload and display student images
- Grade and attendance management
- Search and filter students
- Input validation and CSRF protection
- Password hashing
- Deployed via localhost or Docker

## Technologies Used

- PHP (CodeIgniter 4 Framework)
- MySQL Database
- Bootstrap 5
- HTML, CSS, JavaScript
- Apache Server (XAMPP or Docker)
- Composer (Dependency Management)

## Installation

Clone the repository and navigate into it:
`git clone https://github.com/yourusername/student_management_system.git && cd student_management_system`

Install dependencies:
`composer install`

Copy `.env` file and configure:
- Set `app.baseURL = 'http://localhost:8080/student_management_system/'`
- Set database credentials (username, password, database)

Create database `student_db` and import `student_db.sql` from the project.

Run development server:
`php spark serve`

Visit: [http://localhost:8080](http://localhost:8080)

## Default Login Credentials

• Admin: admin@example.com / admin123  

## Project Structure

- `/app` – Application logic (Controllers, Models, Views)
- `/public` – Front-facing directory (index.php, assets)
- `/app/Controllers` – Handles routing and logic
- `/app/Models` – Interfaces with the database
- `/app/Views` – Blade-style HTML templates for UI
- `/writable` – Logs, uploads, and cache files

## Docker Deployment (Optional)

If you want to run using Docker:

Ensure Docker and Docker Compose are installed. Use the provided `docker-compose.yml`:

`docker-compose up --build`

Access the system at: [http://localhost:8080](http://localhost:8080)

## Challenges Encountered and Lessons Learned

- Implementing secure authentication with hashed passwords and session control taught careful session handling and validation.
- Uploading and displaying student images introduced file handling, path management, and conditional display logic.
- Role-based access required structuring middleware-like conditions and views that respond to user permissions.
- Encountered database errors due to mismatched table fields which reinforced the importance of syncing models with migrations.
- Managing view logic for attendance and grades expanded understanding of modular controllers and relational database design.
- Docker deployment helped understand environment configuration differences and portability.
- Finally, integrating search and filter functionality required building dynamic queries and improving UI responsiveness.

## Server Requirements

- PHP version 8.1 or higher
- MySQL
- Apache Server
- Composer

Required PHP extensions:
- intl
- mbstring
- json
- curl
- mysqlnd

## License

This project is open-source and free to use under the MIT License.

"# student_management_system" 
