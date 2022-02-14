# accounts

A really simple finance management application for some personal purposes.

### Install

```shell
# Clone down the project files using git
git clone https://github.com/ssddanbrown/accounts.git

# cd into the application folder and install the dependencies via composer
composer install --no-dev

# Copy the .env.example file to .env and fill with your own details
cp .env.example .env # (Then go through each option in there)

# Set the application key
php artisan key:generate

# Create the storage/database/database.sqlite file
touch storage/database/database.sqlite

# Migrate the database
php artisan migrate

# Install and build JS/CSS dependencies
npm install
npm run build

# Check the storage/ and boostrap/cache (and all subfolders) are writable by the webserver, Commands reflect ubuntu common defaults
chown -R www-data:www-data storage/ boostrap/cache/

# Set up your webserver with the root pointing at the `public/` folder. (Nginx "root" or Apache "DocumentRoot"). 
# Done!
```

### Low Maintenance Project

This is a low maintenance project. The scope of features and support are
purposefully kept narrow for my purposes to ensure longer term maintenance is viable.
I'm not looking to grow this into a bigger project at all.

Issues and PRs raised for bugs are perfectly fine assuming they don't significantly
increase the scope of the project. Please don't open PRs for new features.

### Testing

This project uses phpunit for testing. Tests are located within the `tests/` directory.
You can run the tests using:

```shell
./vendor/bin/phpunit
```
