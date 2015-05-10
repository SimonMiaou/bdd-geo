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

function date_pour_sql($date) {
  return date('Y/m/d', strtotime($date));
}
?>
