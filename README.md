## About Inveniet

Inveniet is an web application that helps with coordinating events whether it's for social gatherings or business meetings.  

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation) 

Clone the repository
<br>
`git clone https://Brayon@bitbucket.org/Brayon/inveniet.git`

Switch to the repo folder
`cd inveniet`

Install all the dependencies using composer
`composer install`

Copy the example env file and make the required configuration changes in the .env file.
`cp .env.example .env`

Generate a new application key
`php arisan key:generate`

Create a mysql database scheme named 'inveniet'

Run the database migrations (Set the database connection in .env before migrating)
`php artisan migrate`

Start the local development server
`php artisan serve`

You can now access the server at http://localhost:8000

#Database Seeding

Populate the database with seed data with Users, Events, relationships between users, and Requests and Event invitations.
`php artisan db:seed`
