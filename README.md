## Define What
I made this project for a coding challenge. This is a website that will tell you the definition of a word.

## Installation
Clone this repository
```bash
git clone https://github.com/dthrcrpz/define-what.git
```

Use the package manager [composer](https://getcomposer.org/) to install Laravel dependencies.

```bash
# navigate to the project folder
cd /path/to/project-folder

composer install
```

If you want to play with the assets, use the package manager [npm](https://nodejs.org/en/) to install frontend dependencies.

```bash
# navigate to the project folder
cd /path/to/project-folder

npm install

npm run watch-poll
```

Put the .env file I sent to you on the project folder. It contains my own Rapid API key. If I haven't sent anything because we don't know each other, you can create your own Rapid API key for WordsAPI [here](https://rapidapi.com/dpventures/api/wordsapi/pricing). 


## Usage

```bash
# navigate to the project folder
cd /path/to/project-folder

# assuming that you have already created a database for this, run the migrations
php artisan migrate

# run the project (you can also host it on your localhost through Nginx/Apache)
php artisan serve
 
# to run tests
php artisan test
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.
