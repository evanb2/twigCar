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

    $app->post("/create_car", function() use ($app) {
        $car = new Car($_POST['model'], $_POST['price'], $_POST['miles'], $_POST['image']);
        $car ->save();
        return $app['twig']->render('create_car.twig', array('newcar' => $car));
    });

    $app->post("/delete_cars", function() use ($app) {
        Car::deleteAll();
        return $app['twig']->render('delete_cars.twig');
    });

    $app->post("/search_results", function() use ($app) {
        $all_cars = Car::getAll();
        $cars_matching_search = array();
        foreach ($all_cars as $car) {
            if ($car->searchPrice($_POST['user_price']) && $car->searchMiles($_POST['user_mileage'])) {
                array_push($cars_matching_search, $car);
            }
        }
        return $app['twig']->render('search_results.twig', array('results' => $cars_matching_search));
    });


    return $app;
?>
