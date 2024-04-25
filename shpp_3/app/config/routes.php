<?php

use Core\Router;
use App\controllers\BookController;
use App\controllers\AdminPageController;
use App\controllers\MigrationController;

// Create an instance of the router
$router = new Router();

// Add routes for the book controller
$router->addRoute('#^\/$#', BookController::class, 'showOffset'); // Show the list of books from the beginning
$router->addRoute('#^\/\?offset=(\d+)$#', BookController::class, 'showOffset'); // Show the list of books with a given offset
$router->addRoute('#^\/\?click=(\d+)$#', BookController::class, 'clickUp'); // Increase the click count for a book
$router->addRoute('#^\/book\/(\d+)$#', BookController::class, 'showById'); // Show information about a book by ID
// Add routes for the admin controller
$router->addRoute('#^\/admin$#', AdminPageController::class, 'showPage'); // Show the admin page
$router->addRoute('#^\/admin\/(\d+)$#', AdminPageController::class, 'showPage'); // Show the admin page with a specified ID
$router->addRoute('#^\/admin\/add$#', AdminPageController::class, 'addBook'); // Add a book
$router->addRoute('#^\/logout$#', AdminPageController::class, 'logout'); // Log out
$router->addRoute('#^\/admin\/delete\/(\d+)$#', AdminPageController::class, 'deleteBook'); // Delete a book
$router->addRoute('#^\/migrate$#', MigrationController::class, 'migrate'); // Run migrations
$router->addRoute('#^\/clean$#', AdminPageController::class, 'deleteBookRelations'); // Run total delete book and relations

// Return the router instance
return $router;
