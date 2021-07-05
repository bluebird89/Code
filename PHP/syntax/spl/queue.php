<?php

$agents = new SplQueue();
$agents->enqueue("Fred");
$agents->enqueue("John");
$agents->enqueue("Keith");
$agents->enqueue("Adiyan");
$agents->enqueue("Mikhael");
echo $agents->dequeue() . "\n";
echo $agents->dequeue() . "\n";
echo $agents->bottom() . "\n";
