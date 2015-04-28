<?php include 'header.php' ?>
<h1>Entraine</h1>

<table>
  <tr>
    <th>N. registre entraineur</th>
    <th>Entraineur</th>
    <th>ID équipe</th>
    <th>Equipe</th>
    <th>Année</th>
  </tr>
  <?php
  $req = $bdd->query('SELECT Entraine.n_registre_entraineur, Personne.prenom as prenom_entraineur, Personne.nom as nom_entraineur, Entraine.id_equipe, Equipe.nom as nom_equipe, Entraine.annee
    FROM Entraine
    JOIN Personne ON Personne.n_registre = Entraine.n_registre_entraineur
    JOIN Equipe ON Equipe.id_equipe = Entraine.id_equipe');
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
