# Search product

Awesome mega smoothie unicorn application for searching product!

## Installation

You need to have free 8080, 3306, 9200, 5601 ports in the system
and installed docker with docker-compose, then just run:

```bash
$ make up
$ make install
```

Or alternatively if you for some reason do not have
make installed in the system just use these commands:

```bash
$ docker-compose up -d
$ docker-compose exec php sh
$ composer install
$ php bin/console doctrine:migrations:migrate
```

Then create some products in DB
then make this command:

```bash
$ php bin/console fos:elastica:populate
```

Now navigate to http://localhost:8080/product/1

## Data source
You can set variable USE_ELASTIC="1" in .env for getting data from Elastic or 0 if you want get them form MySQL