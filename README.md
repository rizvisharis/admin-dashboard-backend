# Admin Dashboard 

A brief description of your project.

## Requirements

- Docker (if running with Docker)
- PHP (version 8.2 or higher)
- Composer 
- MySQL or your preferred database server

## Installation

1. Clone the repository: `git clone https://github.com/your-username/project.git`
2. Navigate to the project directory: `cd project`

### Using Docker (Recommended)

1. Start the Docker daemon.
2. Run the following command to start the Docker environment: `./vendor/bin/sail up -d`
3. Install dependencies using Composer: `./vendor/bin/sail composer install`
4. Run database migrations: `./vendor/bin/sail artisan migrate`
5. Seed the admin user to the database: `./vendor/bin/sail artisan db:seed`

### Running Locally

1. Clone the repository: `git clone https://github.com/your-username/project.git`
2. Install Composer on your local machine.
3. Navigate to the project directory: `cd project`
4. Install dependencies using Composer: `composer install`
5. Configure your local database settings in the `.env` file.
6. Run database migrations: `php artisan migrate`
7. Seed the admin user to the database: `php artisan db:seed`

## Usage

1. After completing the installation steps, the project is ready to use.
2. Launch the server:
   - Using Docker: Access the project at `http://localhost:80` in your web browser.
   - Running Locally: Start the server with the following command: `php artisan serve`. Access the project at `http://localhost:8000` in your web browser.
3. You will see the login screen when run along with front-end.
4. Enter the following credentials to log in:
   - Email: admin@example.com
   - Password: 12341234

## Additional Information

- API authentication is implemented using Laravel Sanctum tokens.
- Make sure to configure the `.env` file properly for your specific environment.

