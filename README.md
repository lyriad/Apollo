
# Apollo

Apollo is a tool for nurses to record patient's blood sample readings.

## Requirements
---
* [PHP](https://www.php.net/downloads.php) ^7.4
* [Composer](https://getcomposer.org/download/)
* [NodeJS](https://nodejs.org/en/download/) ^11.x
* NPM
* [MySQL](https://dev.mysql.com/downloads/mysql/) (Optional)

#### PHP Extensions
* gd
* fileinfo
* pdo_sqlite
* pdo_mysql (Optional)

## Installation
---
Clone the repository and enter the project folder.
```bash
  git clone https://github.com/lyriad/Apollo.git
  cd Apollo
```

Install Composer and NPM dependencies.
```bash
  composer install
  npm install
```

Create a `.env` file from the example environment file, and setup the necessary variables.
```bash
  cp .env.example .env
```

Generate a new application key.
```bash
  php artisan key:generate
```

Perform database migrations. Default database driver is SQLite, but you can change this in the `.env` file.
```bash
  php artisan migrate
```

Seed database with sample data.
```bash
  php artisan db:seed
```

Compile assets and generate Mix manifest.
```bash
  npm run dev
```

Run the application.
```bash
  php artisan serve
```