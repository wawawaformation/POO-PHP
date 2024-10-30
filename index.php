<?php
require_once 'Compte.php';

$thomas = new Compte(titulaire: 'Thomas UZAN',  solde: 1000);
$joana = new Compte('Joana', 200);

$joana->retirer(100);
$joana->deposer(150);

$thomas->virer($joana, 900);


echo 'Il y a actuellement ' . Compte::$compteur . ' objets créé';

echo '<pre>';
var_dump($thomas, $joana);