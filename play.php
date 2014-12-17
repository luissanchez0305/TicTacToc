<?php
include_once 'cuadro.php';
include_once 'helper.php';
$a1 = $_GET['a1'];
$a2 = $_GET['a2'];
$a3 = $_GET['a3'];
$b1 = $_GET['b1'];
$b2 = $_GET['b2'];
$b3 = $_GET['b3'];
$c1 = $_GET['c1'];
$c2 = $_GET['c2'];
$c3 = $_GET['c3'];

$c = new cuadro();
$c->a1 = $a1;
$c->a2 = $a2;
$c->a3 = $a3;
$c->b1 = $b1;
$c->b2 = $b2;
$c->b3 = $b3;
$c->c1 = $c1;
$c->c2 = $c2;
$c->c3 = $c3;

$h = new helper();
/*$winner = $h->isWinner($c);

echo $winner;*/
$h->pruebaRecursive(5);
//print $h->factorial(6);
?>