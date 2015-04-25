<?php include 'header.php' ?>
<h1>Hello World !</h1>

<ul>
  <?php
  $req = $bdd->query('SELECT * FROM Personne');
  while($tuple = $req->fetch()){
    echo '<li>'.$tuple['nom'].' '.$tuple['prenom'].'</li>';
  }
  ?>
</ul>

<?php include 'footer.php' ?>
