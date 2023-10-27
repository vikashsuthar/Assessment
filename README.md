1.Clone the Repository: 
2.Install Dependencies: Use Composer to install the required PHP dependencies by navigating to the project directory and executing:
    composer install
3.Install Node.js Dependencies: Install the JavaScript dependencies using npm:
    npm install
4.Build Assets: Compile and build the front-end assets using npm:
    npm run dev
5.Environment Configuration: Copy the example environment file and create a new one:
    cp .env.example .env
6.In your newly created .env file, configure your database connection settings.

7.Database Setup: Create and migrate the database using the Laravel Artisan command:
    php artisan migrate
8.Seed the Database: Populate the database with initial data:
    php artisan db:seed
9.Start the Application: Run the Laravel development server to start the application:

Admin Panel (Pending)
Please note that the admin side of this application is still pending due to time constraints. 

Image Display Issue
Currently, the images of the books may not display correctly as the image URLs return a 404 error.
