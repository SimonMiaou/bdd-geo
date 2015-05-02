<?php include 'header.php' ?>
<h1>JouePour</h1>

<form method='get' action='joue_pour.php'>
  <input type='text' name='n_registre_joueur' placeholder='N. registre joueur' />
  <input type='text' name='id_equipe' placeholder='ID équipe' />
  <input type='text' name='annee' placeholder='Année' />
  <input type='submit' value='Soumettre' />
</form>

<table>
  <tr>
    <th>N. registre joueur</th>
    <th>Joueur</th>
    <th>ID équipe</th>
    <th>Equipe</th>
    <th>Année</th>
  </tr>
  <?php
  $where = '';
  if (isset($_GET['n_registre_joueur']) && $_GET['n_registre_joueur'] && $_GET['n_registre_joueur'] != '*') {
    $where = 'WHERE JouePour.n_registre_joueur = '.intval($_GET['n_registre_joueur']);
  }
  if (isset($_GET['id_equipe']) && $_GET['id_equipe'] && $_GET['id_equipe'] != '*') {
    $where = where_ou_and($where).'JouePour.id_equipe = '.intval($_GET['id_equipe']);
  }
  if (isset($_GET['annee']) && $_GET['annee'] && $_GET['annee'] != '*') {
    $where = where_ou_and($where).'JouePour.annee = '.intval($_GET['annee']);
  }
  $req = $bdd->query('SELECT JouePour.n_registre_joueur, Personne.prenom as prenom_joueur, Personne.nom as nom_joueur, JouePour.id_equipe, Equipe.nom as nom_equipe, JouePour.annee
    FROM JouePour
    JOIN Personne ON Personne.n_registre = JouePour.n_registre_joueur
    JOIN Equipe ON Equipe.id_equipe = JouePour.id_equipe '.$where);
  while($tuple = $req->fetch()){
    ?>
    <tr>
      <td><?php echo $tuple['n_registre_joueur'] ?></td>
      <td>
        <?php echo $tuple['prenom_joueur'] ?>
        <?php echo $tuple['nom_joueur'] ?>
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
