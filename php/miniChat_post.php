<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=mini_chat;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


// Effectuer ici la requête qui insère le message :
//var_dump($_POST);
$pseu = $_POST["pseudo"];
$mess = $_POST["message"];

$req = $bdd->prepare('INSERT INTO chat(pseudo, message) VALUES(:pseudo, :message)');

$req->execute(array(
	'pseudo' => $pseu,
	'message' => $mess
	));

// Puis rediriger vers minichat.php comme ceci :
header('Location: miniChat.php');
?>