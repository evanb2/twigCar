<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car.php";

    session_start();
    if (empty($_SESSION['list_of_cars'])) {
        $_SESSION['list_of_cars'] = array();
    }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('car_homepage.twig', array('cars' => Car::getAll()));
    });

    $app->post("/listing", function() use ($app) {
        $car = new Car($_POST['make', 'price', 'miles', 'image']);
        $car ->save();
        return $app['twig']->render('create_car.twig', array('newcar' => $car));
    });

    $app->post("/delete_cars", function() use ($app) {
        Car::deleteAll();
        return $app['twig']->render('delete_cars.twig');
    });


    return $app;
?>
