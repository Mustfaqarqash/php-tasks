<?php

class Car {
    private $make;
    private $model;
    private $vin;

    public function __construct($make, $model, $vin) {
        $this->make = $make;
        $this->model = $model;
        $this->vin = $vin;
    }

    public function __destruct() {
        echo "Car destroyed: $this->make $this->model ($this->vin)\n";
    }

    public function getDetails() {
        return "Make: $this->make, Model: $this->model, VIN: $this->vin";
    }

    public function getMake() {
        return $this->make;
    }

    public function setMake($make) {
        $this->make = $make;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getVin() {
        return $this->vin;
    }

    public function setVin($vin) {
        $this->vin = $vin;
    }
}

class Inventory {
    private $cars = [];

    public function addCar(Car $car) {
        $this->cars[$car->getVin()] = $car;
    }

    public function removeCar($vin) {
        if (isset($this->cars[$vin])) {
            unset($this->cars[$vin]);
        }
    }

    public function listCars() {
        foreach ($this->cars as $car) {
            echo $car->getDetails() . "\n";
        }
    }
}

$inventory = new Inventory();

$car1 = new Car("Toyota", "Corolla", "1HGBH41JXMN109186");
$car2 = new Car("Honda", "Civic", "2HGBH41JXMN109187");

$inventory->addCar($car1);
$inventory->addCar($car2);

$inventory->listCars();

$inventory->removeCar("1HGBH41JXMN109186");

$inventory->listCars();
?>
