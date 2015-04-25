<?php include 'header.php' ?>
<h1>Equipes</h1>

<table>
  <tr>
    <th>License du club</th>
    <th>Nom du club</th>
    <th>Nom de l'équipe</th>
  </tr>
  <?php
  $req = $bdd->query('SELECT Equipe.licence_club, Club.nom as nom_club, Equipe.nom
    FROM Equipe JOIN Club
     ON Club.licence = Equipe.licence_club');
  while($tuple = $req->fetch()){
    ?>
    <tr>
      <td><?php echo $tuple['licence_club'] ?></td>
      <td><?php echo $tuple['nom_club'] ?></td>
      <td><?php echo $tuple['nom'] ?></td>
    </tr>
    <?php
  }
  ?>
</table>

<?php include 'footer.php' ?>
