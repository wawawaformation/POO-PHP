<?php
require_once 'Compte.php';
require_once 'Debug.php';

$thomas = new Compte(titulaire: 'Thomas UZAN',  solde: 1000);
$joana = new Compte('Joana', 200);

$joana->retirer(100);
$joana->deposer(150);

$thomas->virer($joana, 900);


Debug::dd($thomas);
Debug::dump($joana);


