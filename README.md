# World of Wonders

Welcome to World of Wonders, the web's number one destination for all things mythical and magical!

## The Brief

People love our store, but one source of frustration for our customers is that they can only buy
one thing at a time! The "Buy Now" button on our products was a good enough start, but it's
time to implement a more flexible solution.

Your task is to modify the site to allow customers to add multiple items to a basket and then
buy them all at once.

### Requirements

- create a basket storage system linked to the browser session
- "Buy Now" button changed to "Add to Basket", adds the product to basket
- basket can be viewed by user
- items can be deleted from basket
- basket shows total cost of all items
- basket should have a "checkout" button, which takes user to the checkout page 
- checkout page should be modified to show info on all products to be purchased in a table, with total
price at the bottom.

You are free to install any additional PHP packages or 3rd party CSS/JS if it helps.

### Extra Challenge: Tax (Optional)

Prices stored on the product are inclusive of tax, but the tax rate of each product is also stored.
If you have some extra time, you _could_ use this to show the product prices exclusive of tax on
the checkout page, and then calculate and sum the tax to show in its own line item. To keep it
simple, assume product price is always rounded up and tax rounded down to the nearest penny.

Example: 
Dragon Eggs are £8,499.99 which includes tax of 5% (tax rate of 0.05).
The price exclusive of tax would be £8,095.23 (rounded up), with £404.76 tax.

## Grading Criteria

First and foremost, please know that you DO NOT have to finish the whole test to score well. You
shouldn't be spending too much time on it, so just submit what you get done within the allotted time.
It doesn't need to be pretty on the front-end either, just focus on functionality.

We'll be looking for:

- A good approach to the problem
- Ability to read, understand and modify existing code
- Usage of appropriate PHP language features
- Knowledge of object-oriented programming concepts

## Technical Info

### Code Layout

The site does not rely on a back-end framework, but uses a couple of Symfony components to make
handling requests easier. It uses [Twig](https://twig.symfony.com/doc/3.x/) for templating, and
[Doctrine](https://www.doctrine-project.org/projects/doctrine-orm/en/2.10/index.html)
for the database. You should be able to make the changes you need to complete the test even
without knowledge of these packages, using the provided code for context. Bootstrap and jQuery
are included in the front-end templates already should you want to use them.

You will mostly be concerned with:

- `config/routes.php` - maps URLs to controller methods
- `src/Controller/` - controllers to handle requests
- `src/Entity/` - database entities
- `templates/` - page templates

### Getting Set Up

In order to run the project, you will need a PHP installation (7.4+) with Composer and the `pdo_sqlite` extension.

To prepare the project for running:
1. fork the repository to your own GitHub account and clone the fork on your machine
2. run `composer install` to install dependencies
3. run `./vendor/bin/doctrine orm:schema-tool:create` to create the SQLite database
4. run `php bin/load-fixtures.php` to set up the data

With the data fixtures loaded you should now be able to load the site. The document root is
the `public` folder. It should work with any server (including PHP's built-in web server).

The `vendor/bin/doctrine` script provides a range of commands to interact with the database
directly if you need to, simply run it with no arguments for a list. You can also use the
SQLite3 CLI tool on the file located at `data/wow.db`.

As you work remember to commit often with useful messages and push the code back to your
GitHub when you're done.

Good luck, and have fun!


