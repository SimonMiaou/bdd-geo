<?php include 'header.php' ?>
<h1>Entraine</h1>

<form method='get' action='entraine.php'>
  <input type='text' name='n_registre_entraineur' placeholder='N. registre entraineur' />
  <input type='text' name='annee' placeholder='Année' />
  <input type='submit' value='Soumettre' />
</form>

<table>
  <tr>
    <th>N. registre entraineur</th>
    <th>Entraineur</th>
    <th>ID équipe</th>
    <th>Equipe</th>
    <th>Année</th>
  </tr>
  <?php
  $where = '';
  if (isset($_GET['n_registre_entraineur']) && $_GET['n_registre_entraineur']) {
    $where = 'WHERE Entraine.n_registre_entraineur = '.intval($_GET['n_registre_entraineur']);
  }
  if (isset($_GET['annee']) && $_GET['annee']) {
    $where = where_ou_and($where).'Entraine.annee = '.intval($_GET['annee']);
  }
  $req = $bdd->query('SELECT Entraine.n_registre_entraineur, Personne.prenom as prenom_entraineur, Personne.nom as nom_entraineur, Entraine.id_equipe, Equipe.nom as nom_equipe, Entraine.annee
    FROM Entraine
    JOIN Personne ON Personne.n_registre = Entraine.n_registre_entraineur
    JOIN Equipe ON Equipe.id_equipe = Entraine.id_equipe '.$where);
  while($tuple = $req->fetch()){
    ?>
    <tr>
      <td><?php echo $tuple['n_registre_entraineur'] ?></td>
      <td>
        <?php echo $tuple['prenom_entraineur'] ?>
        <?php echo $tuple['nom_entraineur'] ?>
      </td>
      <td><?php echo $tuple['id_equipe'] ?></td>
      <td><?php echo $tuple['nom_equipe'] ?></td>
      <td><?php echo $tuple['annee'] ?></td>
    </tr>
    <?php
  }
  ?>
</table>

<?php include 'footer.php' ?>
