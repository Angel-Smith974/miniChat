<form action="miniChat_post.php" method="post">
    <p>Pseudo : <input type="text" name="pseudo" id="pseudo"></p>
    <p>Message : <input type="text" name="message" id="message"></p>
    <input type="submit" value="Envoyer">
</form>

<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=mini_chat;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT pseudo,message FROM chat');

while ($donnees = $reponse->fetch())
{
?>
    <strong><?php echo $donnees['pseudo']?></strong><br />
    <p><?php echo $donnees['message']?></p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>