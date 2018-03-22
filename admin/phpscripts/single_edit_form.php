<?php

  function  single_edit($tbl,$col,$id){

      $result = getSingle($tbl,$col,$id);
      $getResult = mysqli_fetch_array($result);
      //echo mysqli_num_fields($result);
echo "<form action=\"phpscripts/editall.php\" method=\"post\">";
echo "<input hidden name=\"tbl\" value=\"{$tbl}\">";
echo "<input hidden name=\"col\" value=\"{$col}\">";
echo "<input hidden name=\"id\" value=\"{$id}\">";

      for( $i=0; $i<mysqli_num_fields($result); $i++ ){
          $datatype = mysqli_fetch_field_direct($result, $i);

          // -> means you reach into the datatype and grab the name etc.
          $fieldname = $datatype -> name;
          //echo $fieldname."<br>";
          $fieldtype = $datatype -> type;
          //echo $fieldtype."<br>";

          //use ajax to remove the movies_ from the column names that appear in browser
          if ($fieldname != $col) {
            echo "<label>{$fieldname}</label><br>";
              //252 is text, 253 is input
            if ($fieldtype != "252") {
              echo "<input type=\"text\" name=\"{$fieldname}\" value=\"{$getResult[$i]}\"><br><br>";
            }else {
              echo "<textarea name =\"{$fieldname}\">{$getResult[$i]}</textarea><br><br>";
            }
          }

      }
echo "<input type=\"submit\" name= \"submit\" value=\"Save Content\">";
echo "</form>";



  }














 ?>
