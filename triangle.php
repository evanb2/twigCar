<?php
class Triangle {
    private $side1;
    private $side2;
    private $side3;

    function __construct($side1, $side2, $side3) {
        if ($side1 + $side2 >= $side3 || $side2 + $side3 >= $side1 ||
            $side1 + $side3 >= $side2) {
                $this->side1 = $side1;
                $this->side2 = $side2;
                $this->side3 = $side3;
        } else {
            echo "<h1>Not A Valid Triangle</h1>";
        }
    }

    function testEquilateral() {
        return (($this->side1 == $this->side2) &&
            ($this->side1 == $this->side3)) ? "True" : "False";
    }

    function testIsosceles() {
        return ($this->side1 == $this->side2 && $this->side1 != $this->side3) ||
            ($this->side1 == $this->side3 && $this->side2 != $this->side3) ||
            ($this->side2 == $this->side3 && $this->side2 != $this->side1) ?
            "True" : "False";
    }

    function testScalene() {
        return $this->side1 != $this->side2 && $this->side1 != $this->side3 &&
            $this->side2 != $this->side3 ? "True" : "False";
    }
}
    $constructed = false;
    if (!(empty($_GET['side1']) && empty($_GET['side2']) && empty($_GET['side3']))) {
        $triangle = new Triangle($_GET['side1'], $_GET['side2'], $_GET['side3']);
        $constructed = true;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Triangle Test</title>
</head>
<body>
    <h1>Here's Your Triangle :)</h1>
    <ul>
        <?php
            if (!$constructed) {
                echo "You forgot to fill in your side length!";
            } else {
                echo "<li>Equilateral: " . $triangle->testEquilateral() . "</li>";
                echo "<li>Isosceles: " . $triangle->testIsosceles() . "</li>";
                echo "<li>Scalene: " . $triangle->testScalene() . "</li>";
            }
        ?>
    </ul>
</body>
</html>
