<?php
  include('connect.php');
  // PULL THE NAMES FROM THE FORM ON single_edit_form.php
    $tbl = $_POST['tbl'];
    $col = $_POST['col'];
    $id = $_POST['id'];

    unset( $_POST['tbl']);
    unset( $_POST['col']);
    unset( $_POST['id']);
    unset( $_POST['submit']);

    //echo count($_POST);

$num = count($_POST);
$qstring = "UPDATE {$tbl} SET ";
$count =0;
foreach($_POST as $key => $value){
  $count ++;
  if ($count != $num) {
    $qstring .= $key. " = '".$value."', " ;
  }else {
    $qstring .= $key. " = '".$value."' " ;
  }
}
//.= means adding/appeending to the variable
$qstring .= "WHERE {$col}={$id}";
//echo $qstring;
$updatequery = mysqli_query($link, $qstring);

if($updatequery){
  header('Location: ../../index.php');
}else {
  echo "There was a problem with the server";
}

mysqli_close($link);

 ?>
