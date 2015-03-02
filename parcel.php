<?php
class Parcel
{
    private $height;
    private $width;
    private $length;
    private $weight;

    function __construct($height, $width, $length, $weight) {
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
        $this->weight = $weight;
    }

    function volume() {
        return $this->height * $this->width * $this->length;
    }

    function costToShip() {
        return $this->volume() + $this->weight;
    }
    // Getter
    function getHeight() {
        return $this->height;
    }
    function getWidth() {
        return $this->width;
    }
    function getLength() {
        return $this->length;
    }
    function getWeight() {
        return $this->weight;
    }
}

    $package= new Parcel($_GET['height'], $_GET['width'], $_GET['length'],
            $_GET['weight']);


?>

<!DOCTYPE html>
<html>
<head>
    <title>Cost to Ship Your Package</title>
</head>
<body>
    <h1>Dimensions and Weight.</h1>
    <ul>
        <?php
            $emptyTest = (array) $package;
            if (empty($emptytest)) {
                echo "You need to specify package dimensions.";
            } else {
                echo "<li>Weight: " . $package->getWeight() . "</li>";
                echo "<li>Height: " . $package->getHeight() . "</li>";
                echo "<li>Width: " . $package->getWidth() . "</li>";
                echo "<li>Length: " . $package->getLength() . "</li>";
                echo "<li>Shipping Cost: $" . $package->costToShip() . "</li>";
            }
        ?>
    </ul>
</body>
</html>
