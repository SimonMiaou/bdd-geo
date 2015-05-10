<?php include 'header.php' ?>
<h1>Rencontres</h1>

<p><a href='encoder_rencontre.php'>Ajouter une rencontre</a></p>

<form method='get' action='rencontres.php'>
  <input type='text' name='id_rencontre' placeholder='ID rencontre' />
  <input type='text' name='id_competition' placeholder='ID compétition' />
  <input type='text' name='id_equipe_domicile' placeholder='ID équipe domicile' />
  <input type='text' name='id_equipe_exterieur' placeholder='ID équipe extérieur' />
  <input type='submit' value='Soumettre' />
</form>

<table>
  <tr>
    <th>ID rencontre</th>
    <th>Etape</th>
    <th>Date</th>
    <th>Compétition</th>
    <th>Equipe domicile</th>
    <th>Goeals équipe domicile</th>
    <th>Equipe extérieur</th>
    <th>Goeals équipe extérieur</th>
  </tr>
  <?php
  $where = '';
  if (isset($_GET['id_rencontre']) && $_GET['id_rencontre'] && $_GET['id_rencontre'] != '*') {
    $where = 'WHERE Rencontre.id_rencontre = '.intval($_GET['id_rencontre']);
  }
  if (isset($_GET['id_competition']) && $_GET['id_competition'] && $_GET['id_competition'] != '*') {
    $where = where_ou_and($where).'Rencontre.id_competition = '.intval($_GET['id_competition']);
  }
  if (isset($_GET['id_equipe_domicile']) && $_GET['id_equipe_domicile'] && $_GET['id_equipe_domicile'] != '*') {
    $where = where_ou_and($where).'Rencontre.id_equipe_domicile = '.intval($_GET['id_equipe_domicile']);
  }
  if (isset($_GET['id_equipe_exterieur']) && $_GET['id_equipe_exterieur'] && $_GET['id_equipe_exterieur'] != '*') {
    $where = where_ou_and($where).'Rencontre.id_equipe_exterieur = '.intval($_GET['id_equipe_exterieur']);
  }
  $req = $bdd->query('SELECT Rencontre.id_rencontre, Rencontre.etape, Rencontre.date, Competition.nom_competition, EquipeDomicile.nom as nom_equipe_domicile, Rencontre.goals_equipe_domicile, EquipeExterieur.nom as nom_equipe_exterieur, Rencontre.goals_equipe_exterieur
    FROM Rencontre
    JOIN Competition ON Competition.id_competition = Rencontre.id_competition
    JOIN Equipe EquipeDomicile ON EquipeDomicile.id_equipe = Rencontre.id_equipe_domicile
    JOIN Equipe EquipeExterieur ON EquipeExterieur.id_equipe = Rencontre.id_equipe_exterieur '.$where);
  while($tuple = $req->fetch()){
    ?>
    <tr>
      <td><?php echo $tuple['id_rencontre'] ?></td>
      <td><?php echo $tuple['etape'] ?></td>
      <td><?php echo $tuple['date'] ?></td>
      <td><?php echo $tuple['nom_competition'] ?></td>
      <td><?php echo $tuple['nom_equipe_domicile'] ?></td>
      <td><?php echo $tuple['goals_equipe_domicile'] ?></td>
      <td><?php echo $tuple['nom_equipe_exterieur'] ?></td>
      <td><?php echo $tuple['goals_equipe_exterieur'] ?></td>
    </tr>
    <?php
  }
  ?>
</table>

<?php include 'footer.php' ?>
