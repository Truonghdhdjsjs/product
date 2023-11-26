<?php
echo view('frontend/templates/header.php');
?>

<section class="bg-success py-5">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-md-8 text-white">
                <h1>Về Chúng Tôi</h1>
                <p>
                    <?php

                   
                    foreach ($contact as $key => $value) : ?>
                        <?= $value['contact']; ?>
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