<?php
require_once ('Car.php');

//$polo = new Car();
//$polo -> name = 'polo';
//$polo ->running ();

$polo = new Car('Polo', 'red');
$polo ->running ();

echo '<br/>';

$mini = new Car('mini', 'black');
$mini ->running ();
