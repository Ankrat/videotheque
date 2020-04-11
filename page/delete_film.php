<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'Robin050', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	// Si tout va bien, on peut continuer

    $req = $bdd->prepare('DELETE FROM film where flm_id=:flm_id');
        
    if (isset($_GET['check'])) { 
		$flm_ids = $_GET['check'];			
		//pour chaque ligne à supprimer
		for($i = 0; $i < count($flm_ids); ++$i) {
    		//supprimer la ligne
		    $req->execute(array(
            'flm_id' => $flm_ids[$i]));
        }
	} 
	
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
?>
<?php include 'Liste.php';?>
