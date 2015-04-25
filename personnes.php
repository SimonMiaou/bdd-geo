<?php include 'header.php' ?>
<h1>Personnes</h1>

<table>
  <tr>
    <th>N. registre</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Nationalite</th>
    <th>Rue</th>
    <th>Numero</th>
    <th>Code postal</th>
    <th>Localité</th>
  </tr>
  <?php
  $req = $bdd->query('SELECT * FROM Personne');
  while($tuple = $req->fetch()){
    ?>
    <tr>
      <td><?php echo $tuple['n_registre'] ?></td>
      <td><?php echo $tuple['nom'] ?></td>
      <td><?php echo $tuple['prenom'] ?></td>
      <td><?php echo $tuple['nationalite'] ?></td>
      <td><?php echo $tuple['rue'] ?></td>
      <td><?php echo $tuple['numero'] ?></td>
      <td><?php echo $tuple['code_postal'] ?></td>
      <td><?php echo $tuple['localite'] ?></td>
    </tr>
    <?php
  }
  ?>
</table>

<?php include 'footer.php' ?>
