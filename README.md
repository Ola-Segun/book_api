# Laravel Project Name

An app for creating, Updating, Reading, Deleting book Details

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [API Documentation](#api-documentation)
- [Contributing](#contributing)
- [License](#license)

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/username/project-name.git
2. Install Composer dependencies:
    ```bash
    composer install
3. Copy the .env.example file and rename it to .env:
    ```bash
    cp .env.example .env
4. Generate an application key:
    ```bash
    php artisan key:generate
5. Set up your database in the .env file:
   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=book_api
    DB_USERNAME=root
    DB_PASSWORD=
6. Run database migrations:
    ```bash
    php artisan migrate
7. Serve the application:
    ```bash
    Serve the application:

## Configurations
This app utilises 'AnApiOfIceAndFire' to get extenal books data

## Usage
### Working with Raw Json Data
#### Testing Endpoints
1. To get extenal book details (this uses the AnApiOfIceAndFire)
    ```bash
    GET http://localhost:8080/api/external-books?name=nameOfABook

2. To get all local data
    ```bash
    GET http://localhost:8080/api/v1/books

3. To Get/Read individual item locally we use the id value of the item
    ```bash
    GET http://localhost:8080/api/v1/books/id

4. Updating an item uses (this is an example of the data)
    ```bash
    {
    "name": "The Night book Updated",
    "isbn": "123-3213243567",
    "authors": ["Molly"],
    "country": "United Kingdom",
    "number_of_pages": 220,
    "publisher": "Evans Books",
    "release_date": "2024-01-01"
    }
6. Then run
    ```bash
    PATCH http://localhost:8080/api/v1/books/id

7. To Delete an item
   ```bash
   DELETE http://localhost:8080/api/v1/books/id

8. Creating an item
    ```bash
    {
    "id": 1,
    "name": "The Carrier book",
    "isbn": "123-3213243567",
    "authors": "[\"Will\",\"Jane Smith\"]",
    "country": "United Kingdom",
    "number_of_pages": 220,
    "publisher": "Acme Books",
    "release_date": "2019-08-01",
    "created_at": "2024-04-18T00:22:56.000000Z",
    "updated_at": "2024-04-18T01:14:44.000000Z"
    }  
10. 
   ```bash
   POST http://localhost:8080/api/v1/books
    
