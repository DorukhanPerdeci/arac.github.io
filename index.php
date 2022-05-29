<?php
require_once 'adminpanel/netting/baglan.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Dorukhan Perdeci</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif"/>
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
          media="screen">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body class="main-layout">
<header>
    <!-- header inner -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="logo">
                        <a href="index.php"><h1 style="color:white;">Dorukhan Perdeci</h1></a>
                    </div>
                </div>
                <div class=" col-md-6 col-sm-6">
                    <ul class="conat_info d_none ">
                        <li><a href="tel:+905380212700">(+90) 5380212700</a></li>
                        <li><a href="mailto:21430070029@mersin.edu.tr">21430070029@mersin.edu.tr</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<section style="background-color: #ffc834;padding-bottom:5%; ">
</section>


<?php

$sayfada = 20; // sayfada gösterilecek içerik miktarını belirtiyoruz.


$sorgu = $db->prepare("select * from arac");
$sorgu->execute();
$toplam_arac = $sorgu->rowCount();

$toplam_sayfa = ceil($toplam_arac / $sayfada);

// eğer sayfa girilmemişse 1 varsayalım.
$sayfa = isset($_GET['sayfa']) ? (int)$_GET['sayfa'] : 1;

// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
if ($sayfa < 1) $sayfa = 1;

// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
if ($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;

$limit = ($sayfa - 1) * $sayfada;

$aracsor = $db->prepare("select * from arac order by arac_sira DESC limit $limit,$sayfada");
$aracsor->execute();

while ($araccek = $aracsor->fetch(PDO::FETCH_ASSOC)) { ?>

    <div style="padding-top: 60px;" id="about" class="about ">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-5">
                    <div class="titlepage">
                        <h2><?php echo $araccek['arac_ad'] ?></h2>
                        <h3><?php echo $araccek['arac_model'] ?></h3>
                        <p> <?php echo $araccek['arac_yazi'] ?>
                        </p>
                        <a class="read_more" ><?php echo $araccek['arac_fiyat'] ?> ₺</a>
                    </div>

                </div>
                <div class="col-md-7">
                    <div class="about_right">
                        <figure><img src="<?php echo $araccek['arac_resim'] ?>" alt="#"/></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>


<footer>
    <div class="footer bottom_cross1">

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>© Dorukhan Perdeci
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<script>
    function openNav() {
        document.getElementById("mySidepanel").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidepanel").style.width = "0";
    }
</script>

</body>
</html>

