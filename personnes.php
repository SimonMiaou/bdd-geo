<?php include 'header.php' ?>
<h1>Personnes</h1>

<form method='get' action='personnes.php'>
  <input type='text' name='n_registre' placeholder='N. registre' required />
  <input type='submit' value='Soumettre' />
</form>

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
  $where = '';
  if (isset($_GET['n_registre']) && $_GET['n_registre'] && $_GET['n_registre'] != '*') {
    $where = 'WHERE n_registre = '.intval($_GET['n_registre']);
  }
  $req = $bdd->query('SELECT * FROM Personne '.$where);
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
