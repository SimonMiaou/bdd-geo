<?php include 'header.php' ?>
<h1>Joueurs ayant joué tout les matchs</h1>

<form method='get' action='joueurs_ayant_joue_tout_les_matchs.php'>
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
  </tr>
  <?php
  /*Trouver les joueurs qui, pour une annee donnee, ont joue tous les matchs
de leur equipe dans une competition donnee.*/
  $req = $bdd->query('SELECT Joueur.n_registre_joueur, Personne.nom as nom_joueur, Personne.prenom as prenom_joueur
    FROM Joueur
    JOIN Personne ON Personne.n_registre = Joueur.n_registre_joueur
    JOIN JoueRencontre
    ON JoueRencontre.n_registre_joueur = Joueur.n_registre_joueur
    AND JoueRencontre.id_rencontre IN (
      SELECT id_rencontre FROM Rencontre WHERE id_competition = '.$_GET['id_competition'].'
    )
    GROUP BY Joueur.n_registre_joueur
    HAVING COUNT(JoueRencontre.id_rencontre) = (
      SELECT COUNT(*)
      FROM Rencontre
      WHERE id_rencontre IN (
        SELECT id_rencontre FROM Rencontre WHERE id_competition = '.$_GET['id_competition'].'
      )
      AND (
        id_equipe_domicile OR id_equipe_exterieur IN (
          SELECT id_equipe
          FROM JouePour
          WHERE JouePour.n_registre_joueur = Joueur.n_registre_joueur
          AND JouePour.annee = (SELECT annee FROM Competition WHERE id_competition = '.$_GET['id_competition'].')
        )
      )
    )
    ');
  while($tuple = $req->fetch()){
    ?>
    <tr>
      <td><?php echo $tuple['n_registre_joueur'] ?></td>
      <td>
        <?php echo $tuple['prenom_joueur'] ?>
        <?php echo $tuple['nom_joueur'] ?>
      </td>
    </tr>
    <?php
  }
  ?>
</table>
<?php } ?>

<?php include 'footer.php' ?>
