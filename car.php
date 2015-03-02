<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $image;

    function __construct($make_model = "generic car", $price = 0, $miles = 0,
            $image = "#") {
        $this->make_model = $make_model;
        $this->price = $price;
        $this->miles = $miles;
        $this->image = $image;
    }

    function worthBuying($max_price)
    {
    return $this->price < ($max_price + 100);
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

$ford = new Car();
$ford->setModel("2011 Ford F450");
$ford->setPrice(55995);
$ford->setMiles(14241);

$lexus = new Car();
$lexus->setModel("2013 Lexus RX 350");
$lexus->setPrice(44700);
$lexus->setMiles(20000);

$mercedes = new Car();
$mercedes->setModel("Mercedes Benz CLS550");
$mercedes->setPrice(39900);
$mercedes->setPrice(37979);

$porsche->setPrice(120000);

$cars = array($subaru, $boringCar, $porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->worthBuying($_GET['price'])) {
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
            foreach ($cars_matching_search as $car) {
                echo "<li> " . $car->getModel() . " </li>";
                echo "<ul>";
                    echo "<li> $" . $car->getPrice() . " </li>";
                    echo "<li> Miles: " . $car->getMiles() . " </li>";
                    echo '<li><img src="' . $car->getImage() . '"></li>';
                echo "</ul>";
            }
        ?>
    </ul>
</body>
</html>
