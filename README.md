## Setup instructions

Clone the repository with clone url

[git clone https://github.com/arunca231/employee_management_system.git]

Set up and Install dependencies

    npm install
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan db:seed
    php artisan serve
    
## How to run the export feature
    This project uses the maatwebsite/excel package (^3.0) to export data to Excel files

    to Export Data

    Use the filters on the page to choose the data you want to export.
    The Export button will only appear after click on filter button
    Click the Export button it will download the filtered data as an Excel file (.xlsx).

