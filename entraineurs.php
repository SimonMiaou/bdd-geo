<?php include 'header.php' ?>
<h1>Entraineurs</h1>

<form method='get' action='entraineurs.php'>
  <input type='text' name='n_registre_entraineur' placeholder='N. registre entraineur' required />
  <input type='submit' value='Soumettre' />
</form>

<table>
  <tr>
    <th>N. registre entraineur</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Date début</th>
  </tr>
  <?php
  $where = '';
  if (isset($_GET['n_registre_entraineur']) && $_GET['n_registre_entraineur'] && $_GET['n_registre_entraineur'] != '*') {
    $where = 'WHERE Entraineur.n_registre_entraineur = '.intval($_GET['n_registre_entraineur']);
  }
  $req = $bdd->query('SELECT Entraineur.n_registre_entraineur, Personne.nom, Personne.prenom, Entraineur.date_debut
                      FROM Entraineur JOIN Personne
                      ON Personne.n_registre = Entraineur.n_registre_entraineur '.$where);
  while($tuple = $req->fetch()){
    ?>
    <tr>
      <td><?php echo $tuple['n_registre_entraineur'] ?></td>
      <td><?php echo $tuple['nom'] ?></td>
      <td><?php echo $tuple['prenom'] ?></td>
      <td><?php echo $tuple['date_debut'] ?></td>
    </tr>
    <?php
  }
  ?>
</table>

<?php include 'footer.php' ?>
