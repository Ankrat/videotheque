<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'Robin050', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	// Si tout va bien, on peut continuer
	
	if (isset($_GET['mode']) && $_GET['mode']=='insert') {
      $req = $bdd->prepare('INSERT INTO film(flm_acteur_principal, flm_duree, flm_format, flm_genre, flm_realisateur, flm_sgenre,flm_statut, flm_titre, flm_etat, flm_description) 
      VALUES(:flm_acteur_principal, :flm_duree, :flm_format, :flm_genre, :flm_realisateur, :flm_sgenre,:flm_statut, :flm_titre, :flm_etat, :flm_description)');
    } else if (isset($_GET['mode']) && $_GET['mode']=='update') {
	  $req = $bdd->prepare('update film set flm_acteur_principal=:flm_acteur_principal, flm_duree=:flm_duree, flm_format=:flm_format, flm_genre=:flm_genre,
	   flm_realisateur=:flm_realisateur, flm_sgenre=:flm_sgenre,flm_statut=:flm_statut, flm_titre=:flm_titre, flm_etat=:flm_etat, flm_description=:flm_description where flm_id='.$_GET['id']);
    }
    
    if (isset($_POST['acteur'])) { 
		$flm_acteur_principal = $_POST['acteur'];
	} else {
		$flm_acteur_principal = "";
	}
	
	
	if (isset($_POST['titre'])) { 
		$flm_titre = $_POST['titre'];
	} else {
		$flm_titre = "";
	}
	
	
	if (isset($_POST['realisateur'])) { 
		$flm_realisateur = $_POST['realisateur'];
	} else {
		$flm_realisateur = "";
	}
	
	
	if (isset($_POST['genre'])) { 
		$flm_genre = $_POST['genre'];
	} else {
		$flm_genre = "";
	}
	
	if (isset($_POST['sgenre'])) { 
		$flm_sgenre = $_POST['sgenre'];
	} else {
		$flm_sgenre = "";
	}
	
	
	if (isset($_POST['format'])) { 
		$flm_format = $_POST['format'];
	} else {
		$flm_format = "";
	}
			
		
	if (isset($_POST['statut'])) { 
		$flm_statut = $_POST['statut'];
	} else {
		$flm_statut = 1;
	}
	
	if (isset($_POST['duree'])) { 
		$flm_duree = $_POST['duree'];
	} else {
		$flm_duree = "00:00:00";
	}
	
	if (isset($_POST['etat'])) { 
		$flm_etat = $_POST['etat'];
	} else {
		$flm_etat = 0;
	}
	
	if (isset($_POST['description'])) { 
		$flm_description = $_POST['description'];
	} else {
		$flm_description = "";
	}

	    $req->execute(array(
    'flm_acteur_principal' => $flm_acteur_principal,
    'flm_duree' => $flm_duree,
    'flm_format' => $flm_format,
    'flm_genre' => $flm_genre,
    'flm_realisateur' => $flm_realisateur, 
    'flm_sgenre' => $flm_sgenre,
    'flm_statut' => $flm_statut, 
    'flm_titre' => $flm_titre,
    'flm_etat' => $flm_etat,
    'flm_description' => $flm_description
	));
    
    
    
    // On récupère le contenu de la table film pour l'id passé en paramètre
    //$reponse = $bdd->query('SELECT * FROM film where flm_id=0 order by flm_genre,flm_sgenre,flm_titre');
	//$donnees = $reponse->fetch();
	//value="<?php echo $donnees['flm_titre']; "
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
?>

<?php 
  if (isset($_GET['mode']) && $_GET['mode']=='update') {
    include 'Liste.php';
  } else {
    include 'Form_Saisie.php';
  }
?>
<?php

//$reponse->closeCursor(); // Termine le traitement de la requête

?>
