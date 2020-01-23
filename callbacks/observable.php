<?php
abstract class Observable {

  private $observers = array();

  public function addObserver(Observer $observer) {
         array_push($this->observers, $observer);
  }

  public function notifyObservers() {
         for ($i = 0; $i < count($this->observers); $i++) {
                 $widget = $this->observers[$i];
                 $widget->update($this);
         }
     }
}


class DataSource extends Observable {

  private $ingrediente;
  private $peso;
  private $calorias;

  function __construct() {
         $this->ingrediente = array();
         $this->peso = array();
         $this->calorias = array();
  }

  public function addRecord($name, $price, $year) {
         array_push($this->ingrediente, $name);
         array_push($this->peso, $price);
         array_push($this->calorias, $year);
         $this->notifyObservers();
  }

  public function getData() {
         return array($this->ingrediente, $this->peso, $this->calorias);
  }
}


?>
