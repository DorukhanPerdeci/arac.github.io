<?php

try {

    $db=new PDO("mysql:host=localhost;dbname=dorukhan;charset=utf8",'root','');
    //echo "veritabanı bağlantısı başarılı";
}

catch (PDOExpception $e) {

    echo $e->getMessage();
}

?>