<?php
ob_start();
session_start();

require_once 'baglan.php';


//=======Admin Girişi=========
if (isset($_POST['admingiris'])) {

    $kullanici_ad = $_POST['kullanici_ad'];
    $kullanici_password = md5($_POST['kullanici_password']);


    if ($kullanici_ad && $kullanici_password) {


        $kullanicisor = $db->prepare("SELECT * from kullanici where kullanici_ad=:ad and kullanici_password=:password");
        $kullanicisor->execute(array(
            'ad' => $kullanici_ad,
            'password' => $kullanici_password
        ));

        $say = $kullanicisor->rowCount();

        if ($say > 0) {

            $_SESSION['kullanici_ad'] = $kullanici_ad;


            header('Location:../include/index.php');


        } else {

            header('Location:../include/login.php?durum=no');

        }
    }

}

//=======Araç Ekle=========
if (isset($_POST['aracekle'])) {

    $uploads_dir = '../../upimg';
    @$tmp_name = $_FILES['arac_resim']["tmp_name"];
    @$name = $_FILES['arac_resim']["name"];
    date_default_timezone_set('Europe/Istanbul');
    $zaman = date("d-m-Y_H-i-s") . '_';
    $refimgyol = substr($uploads_dir, 6) . "/" . $zaman . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$zaman$name");

    $kaydet = $db->prepare("INSERT INTO arac SET
		arac_ad=:arac_ad,
		arac_resim=:resim,
		arac_model=:arac_model,
		arac_yazi=:arac_yazi,
		arac_fiyat=:arac_fiyat,
        arac_sira=:arac_sira
                   ");
    $insert = $kaydet->execute(array(
        'arac_ad' => $_POST['arac_ad'],
        'arac_model' => $_POST['arac_model'],
        'arac_yazi' => $_POST['arac_yazi'],
        'arac_fiyat' => $_POST['arac_fiyat'],
        'arac_sira' => $_POST['arac_sira'],
        'resim' => $refimgyol
    ));

    if ($insert) {

        Header("Location:../include/index.php?durum=ok");

    } else {

        Header("Location:../include/index.php?durum=no");
    }

}

if (isset($_POST['aracresimdegis'])) {

    $uploads_dir = '../../upimg/arac';
    @$tmp_name = $_FILES['arac_resim']["tmp_name"];
    @$name = $_FILES['arac_resimyol']["name"];
    date_default_timezone_set('Europe/Istanbul');
    $zaman = date("d-m-Y_H-i-s") . '_';
    $refimgyol = substr($uploads_dir, 6) . "/" . $zaman . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$zaman$name");

    $arac_id = $_POST['arac_id'];

    $kaydet = $db->prepare("UPDATE arac SET
		arac_resim=:arac_resim
		WHERE arac_id={$_POST['arac_id']}");
    $update = $kaydet->execute(array(
        'arac_resim' => $refimgyol
    ));

    if ($update) {

        Header("Location:../include/arac-duzenle.php?durum=ok&arac_id=$arac_id");

    } else {

        Header("Location:../include/arac-duzenle.php?durum=no&arac_id=$arac_id");
    }

}
//=======Araç Sil=========
if ($_GET['aracsil'] == "ok") {

    $sil = $db->prepare("DELETE from arac where arac_id=:arac_id");
    $kontrol = $sil->execute([
        'arac_id' => $_GET['arac_id']
    ]);

    if ($kontrol) {

        Header("Location:../include/index.php?durum=ok");

    } else {

        Header("Location:../include/index.php?durum=no");
    }

}