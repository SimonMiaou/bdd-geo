<?php include 'header.php' ?>
<h1>Compétitions</h1>

<form method='get' action='competitions.php'>
  <input type='text' name='id_competition' placeholder='ID compétition' required />
  <input type='submit' value='Soumettre' />
</form>

<table>
  <tr>
    <th>ID compétition</th>
    <th>Nom</th>
    <th>Année</th>
  </tr>
  <?php
  $where = '';
  if (isset($_GET['id_competition']) && $_GET['id_competition'] != '*') {
    $where = 'WHERE id_competition = '.intval($_GET['id_competition']);
  }
  $req = $bdd->query('SELECT * FROM Competition '.$where);
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
