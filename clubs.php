<?php include 'header.php' ?>
<h1>Clubs</h1>

<table>
  <tr>
    <th>Licence</th>
    <th>Nom</th>
    <th>Stade</th>
    <th>Pays</th>
  </tr>
  <?php
  $req = $bdd->query('SELECT * FROM Club');
  while($tuple = $req->fetch()){
    ?>
    <tr>
      <td><?php echo $tuple['licence'] ?></td>
      <td><?php echo $tuple['nom'] ?></td>
      <td><?php echo $tuple['stade'] ?></td>
      <td><?php echo $tuple['pays'] ?></td>
    </tr>
    <?php
  }
  ?>
</table>

<?php include 'footer.php' ?>
