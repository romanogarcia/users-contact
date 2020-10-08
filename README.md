Steps:

Clone the repository
- git clone https://github.com/romanogarcia/users-contact.git

Create the env file and add your user and db password
- cp .env.example .env

Update/install the vendor folder
- composer update

Generate new key
- php artisan key:generate

Run migration 
- php artisan migrate

Run server
- php artisan serve

Visit the site
- http://127.0.0.1:8000/contacts


*** Using zip file ***

Download the zip file and extract on your webroot

Create the env file and add your user and db password
- cp .env.example .env

Update/install the vendor folder
- composer update

Generate new key
- php artisan key:generate

Run migration 
- php artisan migrate

Run server
- php artisan serve

Visit the site
- http://127.0.0.1:8000/contacts
