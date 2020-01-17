<html>
<body>
<head>
<style>
body {font : 12px verdana; font-weight:bold}
td {font : 11px verdana;}
</style>
</head>

<?php
$totalS = 0;
abstract class Construccio {
  
  public $nom;
  public $superficie;
  public $casa = array();

  public function sumar(){
  	$totalS = $this->getSuperficie();
    foreach($this->casa as $house) {
        $totalS=$totalS + $house->sumar();
    }
    return $totalS;   
  }

  function add(Construccio  $house) {
    array_push($this->casa, $house);
  }
  
  public function setName($nom) {
   $this->nom = $nom;
  }
  public function setSuperficie($superficie) {
    $this->superficie = $superficie;
  }
  public function hasChildren() {
    return (bool)(count($this->casa) > 0);
  }
      
  public function getDescription() {
    echo "- one " . $this->getName() .". Superficie: ". $this->getSuperficie();
    if ($this->hasChildren()) {
      echo " which includes:<br>";	
      foreach($this->casa as $house) {
         echo "<table cellspacing=5 border=0><tr><td>&nbsp;&nbsp;&nbsp;</td><td>-";
         $house->getDescription();
         echo "</td></tr></table>";
      }        
    }
  }
  
 public function getName() {
   return $this->nom;
 }

 public function getSuperficie() {
   return $this->superficie;
 }
  
}
  

class habitacio extends Construccio {
   function __construct($nom) {
    parent::setName($nom);
    parent::setSuperficie(20);
  }    
}

class porta extends Construccio {
  function __construct($nom) {
    parent::setName($nom);
    parent::setSuperficie(2);
  }
}

class finestra extends Construccio {
  function __construct($nom) {
    parent::setName($nom);
    parent::setSuperficie(1);
  }
}

class cama extends Construccio {
  function __construct($nom) {
    parent::setName($nom);
    parent::setSuperficie(2);
  }
}

class escritorio extends Construccio {
  function __construct($nom) {
    parent::setName($nom);
    parent::setSuperficie(100);
  }
}


$muebles = new habitacio("habitacio jesus");
$muebles->add(new porta("puerta de acacia"));
$muebles->add(new finestra("finestra trencada"));
$muebles->add(new cama("cama de agua"));
$muebles->add(new escritorio("escritorio de los dioses"));

echo "Mi habitacion, wey: <p>";		
$muebles->getDescription();
echo "Total superficie: ". $muebles->sumar();




?>

</body>
</html>
