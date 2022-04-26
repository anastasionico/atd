## How to lunch the application
Run the following commands
- cd <application_folder>
- sh launch.sh
- ready to go at http://localhost:8088/search

The 'sh launch.sh' command will automatically take care of installing docker and docker-compose locally.

It will also generate the application keys needed for Laravel to work and refresh the caches.

## Endpoints 

### /search
The search endpoint is available at http://localhost:8088/search

The form includes 4 fields that update the query parameter

The titles in the product's list are clickable, they provide an API to the product's detail 
  
### /product/{product_id}
This API's endpoint provides the details of the selected product according to the product_id

## test
Two suites of tests (Features and Unit) have been created and can be executed by the command

- vendor/bin/phpunit 
