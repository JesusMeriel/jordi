<?php
require_once("observable.php");
require_once("abstract_widget.php");

$dat = new DataSource();
$dat2 = new DataSource2();

$widgetA = new BasicWidget();
$widgetB = new FancyWidget();
$widgetC = new BasicWidgetkorn();
$widgetD = new FancyWidgetkorn();

$dat->addObserver($widgetA);
$dat->addObserver($widgetB);
$dat2->addObserver($widgetC);
$dat2->addObserver($widgetD);



$dat->addRecord("drum", "$12.95", 1955);
$dat->addRecord("guitar", "$13.95", 2003);
$dat->addRecord("banjo", "$100.95", 1945);
$dat->addRecord("piano", "$120.95", 1999);

$widgetA->draw();
$widgetB->draw();


$dat2->addRecord("blind", 4, 1994, "korn", 5);
$dat2->addRecord("BLAME", 3, 2002, "Untouchables", 4);
$dat2->addRecord("bitch we got a problem", 4, 2007, "Untitled", 3);
$dat2->addRecord("blind(unreleased version)", 5, 1993, "proud", 5);

$widgetC->draw();
$widgetD->draw();
?>
