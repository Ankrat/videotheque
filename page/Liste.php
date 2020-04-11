<?php

//variables
    $arGenre = array(
    0 => 'Aucun',
    1 => 'Action',
    2 => 'Aventure',
    3 => 'Comédie',
    4 => 'Drame',
    5 => 'Fantastique',
    6 => 'Horreur',
    7 => 'Policier',
    8 => 'Science Fiction',
    9 => 'Super Héros',
    10 => 'Suspens',
    11 => 'Western'
	);
   
   $arFormat = array(
    0 => 'DVD',
    1 => 'Blue-ray',
    2 => 'Blue-ray DVD',
    3 => '4k'   
	);
	
	$arStatut = array(
    0 => 'Disponible',
    1 => 'Indisponible',
    2 => 'Prêté',
    3 => 'Endommagé'   
	);
	
	$arEtat = array(
    0 => 'Excellent',
    1 => 'Bon',
    2 => 'Moyen',
    3 => 'Mauvais'   
	);
	
//connection bdd
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'Robin050', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	// Si tout va bien, on peut continuer
	//test git

    // On récupère tout le contenu de la table film
    $reponse = $bdd->query('SELECT * FROM film order by flm_genre,flm_sgenre,flm_titre');
  	
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
		<link rel="stylesheet" href="/Films/css/Liste.css">
        <meta charset="utf-8" />
        <title>Liste des films</title>
        <link href="/Films/css/main.css" type="text/css" rel="stylesheet" media="all">
        <script src="Liste.js" type="text/javascript"></script>
    </head>
    <body>
        <h1>Liste des films</h1>
        <form method="post" id="liste">
			<table>
				<tr>
					<th></th>
					<th>Titre</th>
					<th>Durée</th>
					<th>Genre</th>
					<th>Sous genre</th>
					<th>Format</th>
					<th>Réalisateur</th>
					<th>Acteur principal</th>
					<th>Statut</th>
					<th>Etat</th>
				</tr>
<ul>
 <!--<li><label id="search">Recherche libre :</label><input type="text" placeholder="Titre,acteur,genre..."
				name="search" /></li>
		<li><label>Critères</label><select>
					<option value="recent">Récent</option>
					<option value="pref">Préférés</option>
					<option value="pref">test</option>
					<option value="dispo">Disponibles</option>
			</select></li> -->
 <li><label id="add">Ajouter</label></li>
 <li><label id="delete">Supprimer</label></li>
</ul>
<?php			
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <tr>
	  <td style="display: none"><?php echo $donnees['flm_id']; ?></td>
	  <td><input type="checkbox" name="check[]" value="<?php echo $donnees['flm_id']; ?>"></td>
      <td name="flm_id" flm_id='<?php echo $donnees['flm_id']; ?>'> <?php echo $donnees['flm_titre']; ?></a></td>
      <td><?php echo $donnees['flm_duree']; ?></td>
      <td><?php echo $arGenre[$donnees['flm_genre']]; ?></td>
      <td><?php echo $arGenre[$donnees['flm_sgenre']]; ?></td>
      <td><?php echo $arFormat[$donnees['flm_format']]; ?></td>
      <td><?php echo $donnees['flm_realisateur']; ?></td>
      <td><?php echo $donnees['flm_acteur_principal']; ?></td>
      <td><?php echo $arStatut[$donnees['flm_statut']]; ?></td>
      <td><?php echo $arEtat[$donnees['flm_etat']]; ?></td>
    </tr>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
</table>
        </form>
    </body>
</html>
