<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $image;

    function __construct($make_model, $price,
            $miles, $image) {
        $this->make_model = $make_model;
        $this->price = $price;
        $this->miles = $miles;
        $this->image = $image;
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
    function setModel($new_make_model) {
        $this->make_model = (string) $new_make_model;
    }
    function setPrice($new_price) {
        $this->price = (string) $new_price;
    }
    function setMiles($new_miles) {
        $this->miles = (string) $new_miles;
    }
    function setImage($new_image) {
        $this->image = (string) $new_image;
    }

    function save()
    {
        array_push($_SESSION['list_of_cars'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_cars'];
    }
    static function deleteAll()
    {
        $_SESSION['list_of_cars'] = array();
    }
}
?>
