<?php include 'header.php' ?>
<h1>Meilleurs buteurs</h1>

<form method='get' action='meilleurs_buteurs.php'>
  <select name='id_competition'>
    <?php
    $req = $bdd->query('SELECT * FROM Competition');
    while ($tuple = $req->fetch()) {
      echo '<option value="'.$tuple['id_competition'].'"">'.$tuple['nom_competition'].' '.$tuple['annee'].'</option>';
    }
    ?>
  </select>
  <input type='submit' value='Soumettre' />
</form>

<?php if (isset($_GET['id_competition'])) { ?>
<table>
  <tr>
    <th>N registre Joueur</th>
    <th>Joueur</th>
    <th>Goals marqués</th>
  </tr>
  <?php
  $req = $bdd->query('SELECT JoueRencontre.n_registre_joueur, Personne.nom as nom_joueur, Personne.prenom as prenom_joueur, SUM(JoueRencontre.n_goals_marques) as n_goals_marques
    FROM JoueRencontre
    JOIN Personne ON Personne.n_registre = JoueRencontre.n_registre_joueur
    WHERE JoueRencontre.id_rencontre IN (
      SELECT id_rencontre FROM Rencontre WHERE id_competition = '.$_GET['id_competition'].'
      )
    GROUP BY JoueRencontre.n_registre_joueur
    ORDER BY SUM(JoueRencontre.n_goals_marques) DESC
    LIMIT 5
    ');
  while($tuple = $req->fetch()){
    ?>
    <tr>
      <td><?php echo $tuple['n_registre_joueur'] ?></td>
      <td>
        <?php echo $tuple['prenom_joueur'] ?>
        <?php echo $tuple['nom_joueur'] ?>
      </td>
      <td><?php echo $tuple['n_goals_marques'] ?></td>
    </tr>
    <?php
  }
  ?>
</table>
<?php } ?>

<?php include 'footer.php' ?>
