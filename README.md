Symfony Standard Edition
========================

**Deploying**:

  * Clone Github public repository to your local machine: "git clone ssh://git@github.com:mersua/rest_api".
  * Go to root directory of project: "cd rest_api"
  * Install all dependencies: "composer update"
  * Database should create in migrations: "php bin/console doctrine:migrations:migrate"
  * There is tests for User's and Item's endpoints (run: "phpunit" in root directory of project)

**API routes**:

*User:
  * Get list of users:
    * Request method: GET
    * Request URL: store/users
    * Response example: 
        1. Users exist:
        Response Code: 200 
        [
            {
                "id":1,
                "name":"User_1",
                "created":"2018-07-30T00:28:47+03:00"
            },
            {
                "id":2,
                "name":"User_2",
                "created":"2018-07-30T00:28:55+03:00"
            },
            {
                "id":3,
                "name":"TestUser",
                "created":"2018-07-30T09:58:59+03:00"
            }
        ]
        2. Users do not exist:
        Response Code: 204 
        {
            "message":"Users do not exist"
        }
        
  * Add new user:
    * Request method: POST
    * Request URL: store/user
    * Request example:
        {
            "name":"New User"
        }
    * Response example:
        1. User added successfully:
        Response Code: 201 
        {
            "id":5,
            "name":"New User",
            "created":"2018-07-30T00:28:47+03:00"
        }
        2. User did not add
        Response Code: 400
        {
            "errorMessages":"validation errors..."
        }
        
*Item:
  * Get list of items:
    * Request method: GET
    * Request URL: store/items
    * Response example: 
        1. Items exist:
        Response Code: 200 
        [
            {
                "id":1,
                "name":"Product_1",
                "price":100.75
            },
            {
                "id":2,
                "name":"Product_2",
                "price":47.15
            },
            {
                "id":3,
                "name":"Product_3",
                "price":25.00
            }
        ]
        2. Items do not exist:
        Response Code: 204 
        {
            "message":"Items do not exist"
        }
        
  * Add new item:
    * Request method: POST
    * Request URL: store/item
    * Request example:
        {
            "name":"New Product",
            "price":50.10
        }
    * Response example:
        1. Item added successfully:
        Response Code: 201 
        {
            "id":7,
            "name":"New Product",
            "price":50.10
        }
        2. Item did not add
        Response Code: 400
        {
            "errorMessages":"validation errors..."
        }
        
*Order:
  * Get list of orders:
    * Request method: GET
    * Request URL: store/orders
    * Response example: 
        1. Orders exist:
        Response Code: 200 
        [
            {
                "id":1,
                "name":"someOrder",
                "created":"2018-07-30T00:29:44+03:00",
                "updated":"2018-07-30T00:29:44+03:00",
                "total_quantity":4,
                "total_price":54002,
                "user":
                {
                    "id":2,
                    "name":"User_2",
                    "created":"2018-07-30T00:28:55+03:00"
                },
                "items":
                [
                    {
                        "id":1,
                        "name":"mersedes",
                        "price":12000.75
                    },
                    {
                        "id":2,
                        "name":"BMW_UNIVERSAL",
                        "price":15000.25
                    }
                ]
            }     
        ]
        2. Order do not exist:
        Response Code: 204 
        {"message":"orders do not exist"}
        
  * Add new order:
    * Request method: POST
    * Request URL: store/order
    * Request example:
        {
            "name":"New Order",
            "user":
            {
                "id":2
            },
            “items”: 
            [
                {
                    "id":1, 
                    "qty":3
                },
                {
                    "id":5, 
                    "qty":3
                }
            ]
        }
    * Response example:
        1. Order added successfully:
        Response Code: 201 
        {
            "id":3,
            "name":"New Order",
            "created":"2018-07-30T00:29:44+03:00",
            "updated":"2018-07-30T00:29:44+03:00",
            "total_quantity":6,
            "total_price":81004.5,
            "user":
            {
                "id":2,
                "name":"User_2",
                "created":"2018-07-30T00:28:55+03:00"
            },
            "items":
            [
                {
                    "id":1,
                    "name":"mersedes",
                    "price":12000.75
                },
                {
                    "id":5,
                    "name":"BMW_UNIVERSAL",
                    "price":15000.25
                }
            ]
        }
        2. Order did not add
        Response Code: 400
        {
            "errorMessages":"validation errors..."
        }

**WARNING**: This distribution does not support Symfony 4. See the
[Installing & Setting up the Symfony Framework][15] page to find a replacement
that fits you best.

Welcome to the Symfony Standard Edition - a fully-functional Symfony
application that you can use as the skeleton for your new applications.

For details on how to download and get started with Symfony, see the
[Installation][1] chapter of the Symfony Documentation.

What's inside?
--------------

The Symfony Standard Edition is configured with the following defaults:

  * An AppBundle you can use to start coding;

  * Twig as the only configured template engine;

  * Doctrine ORM/DBAL;

  * Swiftmailer;

  * Annotations enabled for everything.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev env) - Adds code generation
    capabilities

  * [**WebServerBundle**][14] (in dev env) - Adds commands for running applications
    using the PHP built-in web server

  * **DebugBundle** (in dev/test env) - Adds Debug and VarDumper component
    integration

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Enjoy!

[1]:  https://symfony.com/doc/3.4/setup.html
[6]:  https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html
[7]:  https://symfony.com/doc/3.4/doctrine.html
[8]:  https://symfony.com/doc/3.4/templating.html
[9]:  https://symfony.com/doc/3.4/security.html
[10]: https://symfony.com/doc/3.4/email.html
[11]: https://symfony.com/doc/3.4/logging.html
[13]: https://symfony.com/doc/current/bundles/SensioGeneratorBundle/index.html
[14]: https://symfony.com/doc/current/setup/built_in_web_server.html
[15]: https://symfony.com/doc/current/setup.html
