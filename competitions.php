<?php include 'header.php' ?>
<h1>Compétitions</h1>

<table>
  <tr>
    <th>ID compétition</th>
    <th>Nom</th>
    <th>Année</th>
  </tr>
  <?php
  $req = $bdd->query('SELECT * FROM Competition');
  while($tuple = $req->fetch()){
    ?>
    <tr>
      <td><?php echo $tuple['id_competition'] ?></td>
      <td><?php echo $tuple['nom_competition'] ?></td>
      <td><?php echo $tuple['annee'] ?></td>
    </tr>
    <?php
  }
  ?>
</table>

<?php include 'footer.php' ?>
