<?php include 'header.php' ?>
<h1>Rencontres</h1>

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
  $req = $bdd->query('SELECT Rencontre.id_rencontre, Rencontre.etape, Rencontre.date, Competition.nom_competition, EquipeDomicile.nom as nom_equipe_domicile, Rencontre.goals_equipe_domicile, EquipeExterieur.nom as nom_equipe_exterieur, Rencontre.goals_equipe_exterieur
    FROM Rencontre
    JOIN Competition ON Competition.id_competition = Rencontre.id_competition
    JOIN Equipe EquipeDomicile ON EquipeDomicile.id_equipe = Rencontre.id_equipe_domicile
    JOIN Equipe EquipeExterieur ON EquipeExterieur.id_equipe = Rencontre.id_equipe_exterieur');
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
