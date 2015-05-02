<?php include 'header.php' ?>
<h1>Joueurs</h1>

<form method='get' action='joueurs.php'>
  <input type='text' name='n_registre_joueur' placeholder='N. registre joueur' required />
  <input type='submit' value='Soumettre' />
</form>

<table>
  <tr>
    <th>N. registre joueur</th>
    <th>Nom</th>
    <th>Prenom</th>
  </tr>
  <?php
  $where = '';
  if (isset($_GET['n_registre_joueur']) && $_GET['n_registre_joueur'] && $_GET['n_registre_joueur'] != '*') {
    $where = 'WHERE Joueur.n_registre_joueur = '.intval($_GET['n_registre_joueur']);
  }
  $req = $bdd->query('SELECT Joueur.n_registre_joueur, Personne.nom, Personne.prenom
                      FROM Joueur JOIN Personne
                      ON Personne.n_registre = Joueur.n_registre_joueur '.$where);
  while($tuple = $req->fetch()){
    ?>
    <tr>
      <td><?php echo $tuple['n_registre_joueur'] ?></td>
      <td><?php echo $tuple['nom'] ?></td>
      <td><?php echo $tuple['prenom'] ?></td>
    </tr>
    <?php
  }
  ?>
</table>

<?php include 'footer.php' ?>
