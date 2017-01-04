<?php

/* @var $this yii\web\View */

$this->title = 'Klinik Sehat';
?>

<!-- Apply any bg-* class to to the info-box to color it -->
<div class="info-box bg-red">
  <span class="info-box-icon"><i class="fa fa-trash"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">stock Expired date</span>
    <span class="info-box-number">41,410</span>
    <!-- The progress section is optional -->
    <div class="progress">
      <div class="progress-bar" style="width: 70%"></div>
    </div>
    <span class="progress-description">
      70% Increase in 30 Days
    </span>
  </div><!-- /.info-box-content -->

</div><!-- /.info-box -->

<div class="info-box">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-green"><i class="fa fa-truck"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">Jumlah Stok</span>
    <span class="info-box-number">93,139</span>
  </div><!-- /.info-box-content -->
</div><!-- /.info-box -->

<div class="info-box">
  <!-- Apply any bg-* class to to the icon to color it -->
  <span class="info-box-icon bg-blue"><i class="fa fa-address-book"></i></span>
  <div class="info-box-content">
    <span class="info-box-text">Jumlah Pasien</span>
    <span class="info-box-number"><?= $jumlah_pasien ?></span>
  </div><!-- /.info-box-content -->
</div><!-- /.info-box -->

