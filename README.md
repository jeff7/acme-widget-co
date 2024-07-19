# Acme Widget Co - Code challenge

Tecnhical challenge for ThriveCart

This test implement a solution to the problem in the link : https://www.dropbox.com/scl/fi/n8x764do2iy0t1pff787b/architech-labs-code-test.pdf?rlkey=uynfzjm445ejhlq7ijf5x5yvu&e=1&dl=0

I created a index.php page to execute too, in addition to unit tests and analyses.

## Requisitos

- PHP 8.1 
- Composer
- Docker

## Configuration

1. **Clone the Repository**

   Clone the Repo in Github.

   git clone https://github.com/jeff7/acme-widget-co.git
   cd acme-widget-co

2. **Run Docker**

  docker-compose up -d

4. **Run the analyse**

  Insider the Docker exec, run:

  vendor/bin/phpstan analyse

3. **Run the tests**

  Insider the Docker exec, run:

  ./vendor/bin/phpunit



