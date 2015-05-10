<?php include 'header.php' ?>
<h1>Equipes</h1>

<form method='get' action='equipes.php'>
  <input type='text' name='licence_club' placeholder='Licence club' required />
  <input type='submit' value='Soumettre' />
</form>

<table>
  <tr>
    <th>License du club</th>
    <th>Nom du club</th>
    <th>ID équipe</th>
    <th>Nom de l'équipe</th>
  </tr>
  <?php
  $where = '';
  if (isset($_GET['licence_club']) && $_GET['licence_club'] && $_GET['licence_club'] != '*') {
    $where = 'WHERE Equipe.licence_club = '.intval($_GET['licence_club']);
  }
  $req = $bdd->query('SELECT Equipe.licence_club, Club.nom as nom_club, Equipe.id_equipe, Equipe.nom
    FROM Equipe JOIN Club
     ON Club.licence = Equipe.licence_club '.$where);
  while($tuple = $req->fetch()){
    ?>
    <tr>
      <td><?php echo $tuple['licence_club'] ?></td>
      <td><?php echo $tuple['nom_club'] ?></td>
      <td><?php echo $tuple['id_equipe'] ?></td>
      <td><?php echo $tuple['nom'] ?></td>
    </tr>
    <?php
  }
  ?>
</table>

<?php include 'footer.php' ?>
