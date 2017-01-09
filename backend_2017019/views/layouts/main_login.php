
<?php

/*assets class*/
// dmstr\web\AdminLteAsset::register($this);
// use app\assets_b\AppAsset;

// AppAsset::register($this);

?>
<body class="login-page">
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">
        <?= $content ?>
    </div>
</div>

<!-- footer author : wawan  -->
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Aditiya Kurniawan <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>