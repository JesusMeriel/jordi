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

  private $names;
  private $prices;
  private $years;

  function __construct() {
         $this->names = array();
         $this->prices = array();
         $this->years = array();
  }

  public function addRecord($name, $price, $year) {
         array_push($this->names, $name);
         array_push($this->prices, $price);
         array_push($this->years, $year);
         $this->notifyObservers();
  }

  public function getData() {
         return array($this->names, $this->prices, $this->years);
  }
}


class DataSource2 extends Observable {

  private $names;
  private $times;
  private $years;
  private $albums;
  private $rates;

  function __construct() {
         $this->names = array();
         $this->times = array();
         $this->years = array();
         $this->albums = array();
         $this->rates = array();
  }

  public function addRecord($name, $time, $year, $album, $rate) {
         array_push($this->names, $name);
         array_push($this->times, $time);
         array_push($this->years, $year);
         array_push($this->albums, $album);
         array_push($this->rates, $rate);
         $this->notifyObservers();
  }


  public function getData() {
         return array($this->names, $this->times, $this->years, $this->albums, $this->rates);
  }
}

?>
