
## Install

- composer install
- php artisan migrate

## Configuration

set this keys in env file

- INTERVAL_HOURS=1
- Themoviedb_Key="53345c0b896cbe9c07e717dd647b7b37"
- Themoviedb_URL_API="https://api.themoviedb.org/3/"
- num_of_pages=5  ## number of page will fetch

## To fetch data from api 
- php artisan fetchThemoviedbData


## run test case 
- .\vendor\bin\phpunit

## run server
- php artisan serve

## api endpoint
run server to use endpoint
- /api/v1/category
- /api/v1/movies
- /api/v1/movies?popular=desc&rated=desc&category_id=12

## frontend endpoint
run server to use endpoint

- /
- /movies
