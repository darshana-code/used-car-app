# Laravel Used Car Dealership Project Setup with Sail

This is a Laravel project for managing used cars. It includes features for searching, filtering, and displaying car information.

## Prerequisites

* PHP 8.0 or higher
* Composer 2.0 or higher
* Docker 20.10 or higher


## Setting Up the Project

1. **Clone the Repository**

   Clone the project repository to your local machine:

   ```bash
   git clone https://github.com/darshana-code/used-car-app.git
   cd used-car-app

2. **Install PHP Dependencies**

   Use Composer to install the PHP dependencies:

   ```bash
   composer install
   ```

3. **Copy the Environment File**

   Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```

4. **Start Laravel Sail**

   Start Laravel Sail:

   ```bash
   ./vendor/bin/sail up -d
   ```

5. **Generate Application Key**

   To Generate the application key:
    ```bash
    ./vendor/bin/sail artisan key:generate
    ```

6. **Run Migrations**

    ```bash
    ./vendor/bin/sail artisan migrate
    ```
    After Migrating the db, seed the db with car and manufacturer data using following command:

    ```bash
    ./vendor/bin/sail artisan db:seed --class=ImportDataFromExcelSeeder
    ```

 
7. **Access the Application**

   You can access the application at [http://localhost](http://localhost).


**Testing the Application**
To run your tests, you can use:

   ```bash
   ./vendor/bin/sail artisan test
   ```

**Additional Commands**

* Stopping Sail: To stop the Sail environment, use:

    ```bash
    ./vendor/bin/sail down
    ```

* Running Artisan Commands: You can run any Artisan command by prefixing it with Sail:

    ```bash
    ./vendor/bin/sail artisan <command>
    ```

**Note**: Used "./vendor/bin/sail composer require maatwebsite/excel" to read data from excel. 
The excel file is being placed in "resources/excel/data.xlsx" to import in db.


