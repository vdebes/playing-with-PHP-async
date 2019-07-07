# Playing with Asynchronous PHP

Like this repo's title suggests, this is just a quick drill using an asynchronous 
PHP library, [M6Web/Tornado](https://github.com/M6Web/Tornado).

## Installation
1. Install PHP dependancies with ```composer install```
2. Generate a DB of a random number of entries ```bin\generateDB```
2. Install and lauch fake API with ```npm install -g json-server@0.14.2``` 
and ```json-server --watch db.json```
3. Launch the demo file with ```bin/demo``` + arguments :
    * ```bookCount```
    * ```authors```
    * ```fullBooksInfo```
    * ```fullBooksInfo monitored```

## Use case
The use case may seem unlikely to exist in real life, this is just for demo purposes.
The demo aggregates informations about a book list via several http requests to provide a 
full data structure you could use on a front end. 
Think of a front end displaying information from several APIs but calling a single endpoint.

### Routes
* GET /list only returns id and title for each entry. 
* GET /books/{id} returns more infos but the author key can still be populated with author's 
information
* GET /authors/{id} returns full information on a given author

## The kata
1. Print the number of books
2. Print the number of authors and their names using two requests (for the sake of the drill)
3. Print a data structure of books with author in a nested array (hint: use promiseForeach())

__Bonus__: For drill 3, display the total number of requests and the elapsed time (hint : use a 
[Decorator](https://en.wikipedia.org/wiki/Decorator_pattern) for httpClient)
