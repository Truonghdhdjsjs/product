<?php
echo view('frontend/templates/header.php');
?>
<section class="bg-black py-5">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-md-8 text-white">
                <h1>Điều khoản dịch vụ</h1>
                <p>
                    <?php
                    //var_dump($contact[0]['content']);
                    //exit;
                    foreach ($dieukhoang as $key => $value) : ?>
                        <?= $value['dieukhoan']; ?>
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


