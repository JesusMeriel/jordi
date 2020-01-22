<?php

interface Observer {
  public function update(Observable $subject);
}


abstract class Widget implements Observer {

  protected $internalData = array();

  abstract public function draw();

  public function update(Observable $subject) {
         $this->internalData = $subject->getData();
  }
}

class BasicWidget extends Widget {

  function __construct() {
  }

  public function draw() {
         $html = "<table border=1 width=130>";
         $html .= "<tr><td colspan=3 bgcolor=#cccccc>
                        <b>Instrument Info<b></td></tr>";

         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $instms = $this->internalData[0];
                $prices = $this->internalData[1];
                $years =  $this->internalData[2];
                $html .=  "<tr><td>$instms[$i]</td><td> $prices[$i]</td>
                           <td>$years[$i]</td></tr>";
                }
         $html .= "</table><br>";
         echo $html;
  }
}


class FancyWidget extends Widget {
  
  function __construct() {
  }
  
  public function draw() {
         $html = 
         "<table border=0 cellpadding=5 width=270 bgcolor=#6699BB>
                <tr><td colspan=3 bgcolor=#cccccc>
                <b><span class=red>Our Latest Prices<span><b>
                </td></tr>
                <tr><td><b>instrument</b></td>
                <td><b>price</b></td><td><b>date issued</b>
                </td></tr>";
         
         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $instms = $this->internalData[0];
                $prices = $this->internalData[1];
                $years =  $this->internalData[2];
                
                $html .= 
                "<tr><td>$instms[$i]</td><td> 
                        $prices[$i]</td><td>$years[$i]
                        </td></tr>";
                }
         $html .= "</table><br>";
         echo $html;
  }
}

class BasicWidgetkorn extends Widget {

  function __construct() {
  }

  public function draw() {
         $html = "<table border=1 width=130 style='color: white;background-color: red'>";
         $html .= "<tr><td colspan=5 bgcolor=#cccccc>
                        <b style='color: black'>Korn songs<b></td></tr>";

         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $name = $this->internalData[0];
                $time = $this->internalData[1];
                $year =  $this->internalData[2];
                $album = $this->internalData[3];
                $rate =  $this->internalData[4];
                $html .=  "<tr><td>$name[$i]</td><td> $time[$i]</td>
                           <td>$year[$i]</td><td>$album[$i]</td><td>$rate[$i]</td></tr>";
                }
         $html .= "</table><br>";
         echo $html;
  }
}


class FancyWidgetkorn extends Widget {
  
  function __construct() {
  }
  
  public function draw() {
         $html = 
         "<table border=0 cellpadding=5 width=270 bgcolor=#6699BB style='color: white;background-color: black'>
                <tr><td colspan=5 bgcolor=#cccccc>
                <b><span class=blue style='color: black'>Korn songs<span><b>
                </td></tr>
                <tr><td><b>song</b></td>
                <td><b>time</b></td><td><b>year</b>
                </td><td><b>album</b></td><td><b>rate</b></td></tr>";
         
         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $name = $this->internalData[0];
                $time = $this->internalData[1];
                $year =  $this->internalData[2];
                $album = $this->internalData[3];
                $rate =  $this->internalData[4];
                
                $html .= 
                "<tr><td>$name[$i]</td><td> $time[$i]</td>
                           <td>$year[$i]</td><td>$album[$i]</td><td>$rate[$i]</td></tr>";
                }
         $html .= "</table><br>";
         echo $html;
  }
}

?>
