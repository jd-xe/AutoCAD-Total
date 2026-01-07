<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Jd\Amisam\Core\Router;
#require_once __DIR__ . '/../src/core/Router.php';


// Cargar variables del entorno
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$baseUrl = $_ENV['BASE_URL'];
define('BASE_URL', $_ENV['BASE_URL']);
define('BASE_PATH', realpath(__DIR__ . '/../'));

#var_dump($_ENV['CLOUDINARY_FOLDER']);

$router = new Router();
$router->handleRequest();