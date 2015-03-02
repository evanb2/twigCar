<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $image;

    function __construct($make_model = "generic car", $price = 99999999,
            $miles = 9999999, $image = "#") {
        $this->make_model = $make_model;
        $this->price = $price;
        $this->miles = $miles;
        $this->image = $image;
    }

    function worthBuyingPrice($max_price)
    {
    return $this->price < ($max_price + 100);
    }
    function worthBuyingMiles($miles)
    {
    return $this->miles < ($miles + 100);
    }

    // getters
    function getModel() {
        return $this->make_model;
    }
    function getPrice() {
        return $this->price;
    }
    function getMiles() {
        return $this->miles;
    }
    function getImage() {
        return $this->image;
    }


    // setters
    function setModel($make_model) {
        $this->make_model = $make_model;
    }
    function setPrice($price) {
        $this->price = $price;
    }
    function setMiles($miles) {
        $this->miles = $miles;
    }
    function setImage($image) {
        $this->image = $image;
    }
}

$subaru = new Car("Subaru", 45000, 35000, "img/subaru.jpg");
$boringCar = new Car();


$porsche = new Car();
$porsche->setModel("2014 Porsche 911");
$porsche->setPrice(114991);
$porsche->setMiles(7864);
$porsche->setImage("img/porsche.jpg");

$ford = new Car();
$ford->setModel("2011 Ford F450");
$ford->setPrice(55995);
$ford->setMiles(14241);
$ford->setImage("img/ford.jpg");

$lexus = new Car();
$lexus->setModel("2013 Lexus RX 350");
$lexus->setPrice(44700);
$lexus->setMiles(20000);
$lexus->setImage("img/lexus.jpg");

$mercedes = new Car();
$mercedes->setModel("Mercedes Benz CLS550");
$mercedes->setPrice(39900);
$mercedes->setPrice(37979);
$mercedes->setImage("img/mercedes.jpg");

$porsche->setPrice(120000);

$cars = array($subaru, $boringCar, $porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->worthBuyingPrice($_GET['price']) &&
            $car->worthBuyingMiles($_GET['miles'])) {
        array_push($cars_matching_search, $car);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            if (empty($cars_matching_search)) {
                echo "We're out of jumping cars at that price/mileage!!!";
            } else {
                foreach ($cars_matching_search as $car) {
                    echo "<li> " . $car->getModel() . " </li>";
                    echo "<ul>";
                        echo "<li> $" . $car->getPrice() . " </li>";
                        echo "<li> Miles: " . $car->getMiles() . " </li>";
                        echo '<li><img src="' . $car->getImage() . '"></li>';
                    echo "</ul>";
                }
            }
        ?>
    </ul>
</body>
</html>
