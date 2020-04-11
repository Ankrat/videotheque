<?php
try
{
	$bUpdate = false;
	//vérifier le mode:ajout ou modification
	if (isset($_GET['flm_id'])) { 
		//modif.
	  $bUpdate = true;
	  $id = $_GET['flm_id'];
	  $form = "<form method='post' action='Ajout_film.php?mode=update&id=$id'>";
	  
	  //ouvrir la connection bdd pour lire les infos du film à mettre à jour
	  // On se connecte à MySQL
	  $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'Robin050', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	  // Si tout va bien, on peut continuer

	  // On récupère tout le contenu de la table film
	  //$req = $bdd->prepare('SELECT * FROM film order by flm_genre,flm_sgenre,flm_titre where flm_id=:flm_id');
	  //$reponse = $req->execute(array('flm_id' => $_POST['flm_id']));
	  $reponse = $bdd->query('SELECT * FROM film where flm_id='.$_GET['flm_id']);
  	  $donnees = $reponse->fetch();  	  
	} else {
		//ajout
	  $form = "<form method='post' action='Ajout_film.php?mode=insert' id='liste'>";
	}
	 	  
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" href="/Films/css/Form_Saisie.css">
		<script src="Form_Saisie.js" type="text/javascript"></script>
        <meta charset="utf-8" />
        <title>Saisie d'un film</title>
    </head>
    <body>
        <h1>Saisie du film</h1> 
        <?php echo ($form) ?>
			<ul id="saisie">
				<li><div><label>Titre</label></div><input id="titre" name="titre" placeholder="saisir un titre" value="<?php echo ($bUpdate ? $donnees['flm_titre'] : "") ?>"></li>
				<li><div><label>Genre</label></div><select id="genre" name="genre" >
					  <option value="0" <?php echo ($bUpdate ? $donnees['flm_genre']==0 ? "selected" : "" : "") ?>>Aucun</option>
					  <option value="1" <?php echo ($bUpdate ? $donnees['flm_genre']==1 ? "selected" : "" : "") ?>>Action</option>
					  <option value="2" <?php echo ($bUpdate ? $donnees['flm_genre']==2 ? "selected" : "" : "") ?>>Aventure</option>
					  <option value="3" <?php echo ($bUpdate ? $donnees['flm_genre']==3 ? "selected" : "" : "") ?>>Comédie</option>
					  <option value="4" <?php echo ($bUpdate ? $donnees['flm_genre']==4 ? "selected" : "" : "") ?>>Drame</option>
					  <option value="5" <?php echo ($bUpdate ? $donnees['flm_genre']==5 ? "selected" : "" : "") ?>>Fantastique</option>
					  <option value="6" <?php echo ($bUpdate ? $donnees['flm_genre']==6 ? "selected" : "" : "") ?>>Horreur</option>
					  <option value="7" <?php echo ($bUpdate ? $donnees['flm_genre']==7 ? "selected" : "" : "") ?>>Policier</option>
					  <option value="8" <?php echo ($bUpdate ? $donnees['flm_genre']==8 ? "selected" : "" : "") ?>>Science Fiction</option>
					  <option value="9" <?php echo ($bUpdate ? $donnees['flm_genre']==9 ? "selected" : "" : "") ?>>Super Héros</option>
					  <option value="10" <?php echo ($bUpdate ? $donnees['flm_genre']==10 ? "selected" : "" : "") ?>>Suspsense</option>
					  <option value="11" <?php echo ($bUpdate ? $donnees['flm_genre']==11 ? "selected" : "" : "") ?>>Western</option>
					</select></li>
				<li><div><label>Sous genre</label></div><select id="sgenre" name="sgenre" >
					  <option value="0" <?php echo ($bUpdate ? $donnees['flm_sgenre']==0 ? "selected" : "" : "") ?>>Aucun</option>
					  <option value="1" <?php echo ($bUpdate ? $donnees['flm_sgenre']==1 ? "selected" : "" : "") ?>>Action</option>
					  <option value="2" <?php echo ($bUpdate ? $donnees['flm_sgenre']==2 ? "selected" : "" : "") ?>>Aventure</option>
					  <option value="3" <?php echo ($bUpdate ? $donnees['flm_sgenre']==3 ? "selected" : "" : "") ?>>Comédie</option>
					  <option value="4" <?php echo ($bUpdate ? $donnees['flm_sgenre']==4 ? "selected" : "" : "") ?>>Drame</option>
					  <option value="5" <?php echo ($bUpdate ? $donnees['flm_sgenre']==5 ? "selected" : "" : "") ?>>Fantastique</option>
					  <option value="6" <?php echo ($bUpdate ? $donnees['flm_sgenre']==6 ? "selected" : "" : "") ?>>Horreur</option>
					  <option value="7" <?php echo ($bUpdate ? $donnees['flm_sgenre']==7 ? "selected" : "" : "") ?>>Policier</option>
					  <option value="8" <?php echo ($bUpdate ? $donnees['flm_sgenre']==8 ? "selected" : "" : "") ?>>Science Fiction</option>
					  <option value="9" <?php echo ($bUpdate ? $donnees['flm_sgenre']==9 ? "selected" : "" : "") ?>>Super Héros</option>
					  <option value="10" <?php echo ($bUpdate ? $donnees['flm_sgenre']==10 ? "selected" : "" : "") ?>>Suspsense</option>
					  <option value="11" <?php echo ($bUpdate ? $donnees['flm_sgenre']==11 ? "selected" : "" : "") ?>>Western</option>
					</select></li>	
				<li><div><label>Durée</label></div><input type="time" id="duree" name="duree" placeholder="saisir une durée" value="<?php echo ($bUpdate ? $donnees['flm_duree'] : "") ?>"></li>
				<li><div><label>Format</label></div><select id="format" name="format" >
					  <option value="0" <?php echo ($bUpdate ? $donnees['flm_format']==0 ? "selected" : "" : "") ?>>DVD</option>
					  <option value="1" <?php echo ($bUpdate ? $donnees['flm_format']==1 ? "selected" : "" : "") ?>>Blue-Ray</option>
					  <option value="2" <?php echo ($bUpdate ? $donnees['flm_format']==2 ? "selected" : "" : "") ?>>Blue-Ray + DVD</option>
					  <option value="3" <?php echo ($bUpdate ? $donnees['flm_format']==3 ? "selected" : "" : "") ?>>4k</option>
					</select></li>
					<!--TODO charger les réalisateurs déjà enregistrés dans la base pour alimenter une liste-->
				<li><div><label>Réalisateur</label></div><input id="realisateur" name="realisateur" placeholder="saisir un réalisateur" value="<?php echo ($bUpdate ? $donnees['flm_realisateur'] : "") ?>"></li>
				<li><div><label>Acteur</label></div><input id="acteur" name="acteur" placeholder="saisir des acteurs" value="<?php echo ($bUpdate ? $donnees['flm_acteur_principal'] : "") ?>"></li>
				<li><div><label>Statut</label></div><select id="statut" name="statut" >
					<option value="0" <?php echo ($bUpdate ? $donnees['flm_statut']==0 ? "selected" : "" : "") ?>>Disponible</option>
					<option value="1" <?php echo ($bUpdate ? $donnees['flm_statut']==1 ? "selected" : "" : "") ?>>Indisponible</option>
					<option value="2" <?php echo ($bUpdate ? $donnees['flm_statut']==2 ? "selected" : "" : "") ?>>Prêté</option>
					<option value="3" <?php echo ($bUpdate ? $donnees['flm_statut']==3 ? "selected" : "" : "") ?>>Endommagé</option>
				  </select></li>
				<li><div><label>Etat</label></div><select id="etat" name="etat" >
					<option value="0" <?php echo ($bUpdate ? $donnees['flm_etat']==0 ? "selected" : "" : "") ?>>Excellent</option>
					<option value="1" <?php echo ($bUpdate ? $donnees['flm_etat']==1 ? "selected" : "" : "") ?>>Bon</option>
					<option value="2" <?php echo ($bUpdate ? $donnees['flm_etat']==2 ? "selected" : "" : "") ?>>Moyen</option>
					<option value="3" <?php echo ($bUpdate ? $donnees['flm_etat']==3 ? "selected" : "" : "") ?>>Mauvais</option>
				</select></li>
				<li><div><label>Description</label></div><textarea id="description" name="description" placeholder="saisir la description"><?php echo ($bUpdate ? $donnees['flm_description'] : "") ?></textarea></li>
			</ul>
			<label id='save'>Enregistrer</label>
			</br></br>
			<a id='retour' href='welcome.php'> Retour liste</a>
        </form>
    </body>
</html>
