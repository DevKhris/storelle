<?php
// start a new session
session_start();
// require the psr-4 autoloader
require_once __DIR__ . '/vendor/autoload.php';

use App\Application;
use App\Config\DbConnection;
use App\Core\Auth;
use App\Controllers\AuthController;
use App\Controllers\MainController;

// connect to database
$conn = DbConnection::dbConnect();
// create new app instance
$app = new Application(__DIR__);

// this routes stay the same even if it's logged or not
// Routes to home view
$app->router->get('/', [MainController::class, 'home']);
// Routes to about view
$app->router->get('/about', [MainController::class, 'about']);
// Routes to contact controller to render view
$app->router->get('/contact', [MainController::class, 'contact']);
// sets the controller for the current request
$app->router->set('/contact', [MainController::class, 'contactHandler']);

// check if visitor is logged and assigns the routes
if (!isset($_SESSION['loggedin'])) {

    //set an array for the routes to redirect to login
    $routes = array('products', 'product', 'shopping-cart', 'profile');

    //routes the rest to login due to user not logged into system by passing the array of routes
    foreach ($routes as $key => $value) {
        $route = $routes[$key];
        $app->router->get('/' . $route, [AuthController::class, 'login']);
        $app->router->set('/' . $route, [AuthController::class, 'loginHandler']);
    }

    // routes login and register to view
    $app->router->get('/login', [AuthController::class, 'login']);
    $app->router->get('/register', [AuthController::class, 'register']);
    // set controller handler for login and register
    $app->router->set('/login', [AuthController::class, 'loginHandler']);
    $app->router->set('/register', [AuthController::class, 'registerHandler']);
} else {
    // Routes products to view
    $app->router->get('/products', [MainController::class, 'products']);
    // Sets controller for products route callback
    $app->router->set('/products', [MainController::class, 'productsHandler']);

    // Routes product to view
    $app->router->get('/product', [MainController::class, 'product']);
    // Sets controller for product route callback
    $app->router->set('/product', [MainController::class, 'productHandler']);

    // Sets review route to view (testing only)
    $app->router->get('/review', [MainController::class, 'review']);
    // Sets controller for review route callback (WIP)
    $app->router->set('/review', [MainController::class, 'reviewHandler']);

    // Sets controller for reviews route callback 
    $app->router->get('/reviews', [MainController::class, 'reviews']);

    // Sets controller for reviews route callback
    $app->router->set('/reviews', [MainController::class, 'reviewsHandler']);

    // Routes shopping cart to view
    $app->router->get('/shopping-cart', [MainController::class, 'shoppingcart']);

    $app->router->set('/shopping-cart', [MainController::class, 'shoppingcartHandler']);

    // routes to profile because the user is logged
    $app->router->get('/login', 'profile');
    $app->router->get('/logout', [AuthController::class, 'logoutHandler']);
    $app->router->get('/register', 'profile');
    $app->router->get('/profile', 'profile');
}

// execute the app
$app->execute();
