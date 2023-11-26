<?php
echo view('frontend/templates/header.php');
?>

<section class="bg-success py-5">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-md-8 text-white">
                <h1>Thông tin liên hệ </h1>
                <p>
                    <?php

                   
                    foreach ($Contactes as $key => $value) : ?>
                        <?= $value['dieu_khoang']; ?>
                    <?php endforeach; ?>
                </p>
            </div>
        </div>
    </div>
</section>






<?php
echo view('frontend/templates/scripts.php');
?>

<?php
echo view('frontend/templates/footer.php');
?>