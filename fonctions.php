<?php
function where_ou_and($where) {
  if ($where == '') {
    $where = 'WHERE ';
  }
  else {
    $where = $where.' AND ';
  }
  return $where;
}
?>
