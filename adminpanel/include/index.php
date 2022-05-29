<?php
require_once 'header.php';
require_once '../netting/islem.php';

?>


    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">

                <div class="col-lg-12">
                    <div class="row">
                        <?php
                        if ($_GET['durum'] == "ok") {
                            ?>
                            <div class="alert alert-success">
                                Güncelleme Başarılı
                            </div>
                        <?php } elseif ($_GET['durum'] == "no") {
                            ?>
                            <div class="alert alert-danger">
                                Güncelleme Başarısız
                            </div>
                        <?php } ?>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Araç Ekle</h5>
                                <p></p>

                                <form action="../netting/islem.php" method="post" enctype="multipart/form-data">

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label"><b>Araç Resmi
                                                : </b></label>
                                        <div class="col-sm-5">
                                            <input name="arac_resim" type="file" required="required" placeholder="Aracın resmini girin"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label"><b>Araç Markası
                                                : </b></label>
                                        <div class="col-sm-5">
                                            <input name="arac_ad" type="text" required="required" placeholder="Aracın markasını girin"
                                                   class="form-control">
                                            <input type="hidden" name="kategori_id">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label"><b>Araç Modeli
                                                : </b></label>
                                        <div class="col-sm-5">
                                            <input name="arac_model" type="text" required="required" placeholder="Aracın modelini girin"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label"><b>Araç Açıklaması
                                                : </b></label>
                                        <div class="col-sm-5">
                                            <textarea name="arac_yazi" type="text" required="required" placeholder="Aracın açıklaması..."
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label"><b>Araç Fiyatı
                                                : </b></label>
                                        <div class="col-sm-5">
                                            <input name="arac_fiyat" type="number" required="required" placeholder="Aracın fiyatını giriniz"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label"><b>Aracın Sırası
                                                : </b></label>
                                        <div class="col-sm-5">
                                            <input name="arac_sira" type="number"  required="required" placeholder="Sıra giriniz"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 text-center">
                                        <button name="aracekle" type="submit" class="btn btn-primary">Ekle</button>
                                    </div>

                                </form>
                                <br><br>
                            </div>
                        </div>
                        <!-- Top Selling -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Araçlar</h5>
                                    <table class="table datatable table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th scope="col">Resim</th>
                                            <th scope="col">Markası</th>
                                            <th scope="col">Modeli</th>
                                            <th scope="col">Fiyatı</th>
                                            <th scope="col">Sırası</th>
                                            <th scope="col">Sil</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $aracsor = $db->prepare("SELECT * FROM arac order by arac_sira DESC");
                                        $aracsor->execute();

                                        $say = 0;

                                        while ($araccek = $aracsor->fetch(PDO::FETCH_ASSOC)) {
                                            $say++ ?>

                                            <tr>
                                                <th>
                                                    <?php echo $say ?>
                                                </th>
                                                <th scope="row"><a href="#"><img
                                                                src="../../<?php echo $araccek['arac_resim']; ?>"
                                                                alt=""></a>
                                                </th>
                                                <td>
                                                    <?php echo $araccek['arac_ad'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $araccek['arac_model'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $araccek['arac_fiyat'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $araccek['arac_sira'] ?>
                                                </td>
                                                <td>
                                                    <a href="../netting/islem.php?arac_id=<?php echo $araccek['arac_id'] ?>&aracsil=ok">
                                                        <button class="btn btn-danger btn-xs">Sil</button>
                                                    </a>
                                                </td>
                                            </tr>

                                        <?php }

                                        ?>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Top Selling -->

                    </div>
                </div><!-- End Left side columns -->


            </div>
        </section>


    </main><!-- End #main -->

<?php require_once 'footer.php'; ?>