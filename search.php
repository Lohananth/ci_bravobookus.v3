<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","");
    $db=mysql_select_db("ci_bravobookus",$con);
    // $query=mysql_query("select * from tbl_contacts where <coloumn_name> LIKE '%{$key}%'");
     $query=mysql_query("select * from tbl_contacts");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['country'];
    }
    echo json_encode($array);
?>