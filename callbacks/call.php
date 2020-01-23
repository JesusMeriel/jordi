<?php


require_once("observable.php");
require_once("abstract_widget.php");
class Dog {
  private $_onspeak;

  public function __construct($name) {
	$this->name = $name;
	}

	public function bark() {
		if(isset($this->onspeak)) {
			if(!call_user_func($this->onspeak)) {
				return false;
			}
		}
		print "Woof, woof!";
	}

	public function onspeak($functionName, $objOrClass = null) {
		if($objOrClass) {
			$callback = array($objOrClass, $functionName);
		} else {
			$callback = $functionName;
		}
		//make sure this stuff is valid
		if(!is_callable($callback, false, $callableName)) {
			throw new Exception("$callableName is not callable " . "as a parameter to onspeak");
			return false;
		}
		$this->onspeak = $callback;
	}

	

	public function eat(){
		$dat = new DataSource();

		$widgetA = new WidgetMenu();

		$dat->addObserver($widgetA);

		$dat->addRecord("queso", "1kg", 200);
		$dat->addRecord("pan", "250g", 100);
		$dat->addRecord("leche", "1kg", 300);
		$dat->addRecord("almendra", "0.3g", 50);

		if(isset($this->onspeak)) {
			if(!call_user_func($this->onspeak)) {
				return false;
			}
		}

		print "estoy comiendo";
		$widgetA->draw();
	}
} //end class Dog


function timeToEat(){
		if(time() < strtotime("today 3:00pm")||time() > strtotime("today 9:00pm")) {
			return false;
		} else {
			return true;
		}
	}
//procedural function
function isEveryoneAwake() {
	if(time() < strtotime("today 0:30pm")||
		time() > strtotime("today 0:31pm")) {
		return false;
	} else {
		return true;
	}
}
$WDG = new dog("fito");
$WDG->onspeak("timeToEat");
$WDG->eat();


?>