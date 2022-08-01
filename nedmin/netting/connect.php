<?php 
try {
    $db=new PDO("mysql:host=localhost;dbname=Eshopping;charset=utf8",'root','12345678');
    //echo"connected!";
} catch (PDOExpception $e) {
    echo $e->getMessage();
}

?>