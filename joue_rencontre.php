<?php include 'header.php' ?>
<h1>JoueRencontre</h1>

<p><a href='encoder_joue_rencontre.php'>Encoder une activité</a></p>

<form method='get' action='joue_rencontre.php'>
  <input type='text' name='n_registre_joueur' placeholder='N. registre joueur' />
  <input type='text' name='id_rencontre' placeholder='ID rencontre' />
  <input type='submit' value='Soumettre' />
</form>

<table>
  <tr>
    <th>N. registre joueur</th>
    <th>Joueur</th>
    <th>ID rencontre</th>
    <th>Etape</th>
    <th>Date</th>
    <th>Nom compétition</th>
    <th>Minutes jouées</th>
    <th>Goals marqués</th>
  </tr>
  <?php
  $where = '';
  if (isset($_GET['n_registre_joueur']) && $_GET['n_registre_joueur'] && $_GET['n_registre_joueur'] != '*') {
    $where = 'WHERE JoueRencontre.n_registre_joueur = '.intval($_GET['n_registre_joueur']);
  }
  if (isset($_GET['id_rencontre']) && $_GET['id_rencontre'] && $_GET['id_rencontre'] != '*') {
    $where = where_ou_and($where).'JoueRencontre.id_rencontre = '.intval($_GET['id_rencontre']);
  }
  $req = $bdd->query('SELECT JoueRencontre.n_registre_joueur, Personne.prenom as prenom_joueur, Personne.nom as nom_joueur, JoueRencontre.id_rencontre, Rencontre.etape as etape_rencontre, Rencontre.date as date_rencontre, Competition.nom_competition, JoueRencontre.n_minutes_jouees, JoueRencontre.n_goals_marques
    FROM JoueRencontre
    JOIN Personne ON Personne.n_registre = JoueRencontre.n_registre_joueur
    JOIN Rencontre ON Rencontre.id_rencontre = JoueRencontre.id_rencontre
    JOIN Competition ON Competition.id_competition = Rencontre.id_competition '.$where);
  while($tuple = $req->fetch()){
    ?>
    <tr>
      <td><?php echo $tuple['n_registre_joueur'] ?></td>
      <td>
        <?php echo $tuple['prenom_joueur'] ?>
        <?php echo $tuple['nom_joueur'] ?>
      </td>
      <td><?php echo $tuple['id_rencontre'] ?></td>
      <td><?php echo $tuple['etape_rencontre'] ?></td>
      <td><?php echo $tuple['date_rencontre'] ?></td>
      <td><?php echo $tuple['nom_competition'] ?></td>
      <td><?php echo $tuple['n_minutes_jouees'] ?></td>
      <td><?php echo $tuple['n_goals_marques'] ?></td>
    </tr>
    <?php
  }
  ?>
</table>

<?php include 'footer.php' ?>
