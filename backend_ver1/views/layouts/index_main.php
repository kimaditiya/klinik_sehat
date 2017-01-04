 
 <?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use mdm\admin\components\MenuHelper;
use mdm\admin\models\Menu;
use app\models\User;
// use app\assets_b\AppAsset;

// AppAsset::register($this);

/*assets class*/
dmstr\web\AdminLteAsset::register($this);

?>

 <body class="hold-transition skin-blue sidebar-mini">
    <?php  $this->beginBody() ?>

    <div class="wrapper">
          <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">

          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"> <div>Klinik</div></span>

          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><div> Klinik Sehat</div></span>
        </a>
       <!-- Header Navbar: style can be found in header.less -->
            <?php

                NavBar::begin([
                  'brandUrl' => Yii::$app->homeUrl,
                  'brandLabel' => '<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                                    <span class="sr-only">Toggle Navigation</span>
                                    </a>',
                                          'options' => [
                                              //'class' => 'navbar-inverse navbar-fixed-top',
                                             'class' => [
                                                 'navbar navbar-inverse navbar-static-top',
                                                 'style'=>'background-color:#313131'
                                             ],
                                              'role'=>'button',
                                              'style'=>'margin-bottom: 0',
                                          ],
                                      ]);

                if (!Yii::$app->user->isGuest) {

                    $menuItems[] =['label' => '<span class="glyphicon glyphicon-off"></span>',
                      'url' => ['/site/logout'],
                      'linkOptions' => ['data-method' => 'post']];

                    if(Yii::$app->user->can('Dept IT'))
                    {
                //       $menuItems[] = ['label' => '<i class="fa fa-user"></i><span class="label label-success">'.User::Findcountuser().'</span>',
                //     'items' => [
                //          ['label' => '<span class="label label-primary">Total User Active equal : '.User::Findcountuser_active().'</span>', 'url' => '#'],
                //          '<li class="divider"></li>',
                //          ['label' => '<span class="label label-danger">Total User InActive equal : '.User::Findcountuser_inactive().'</span>', 'url' => '#'],
                //     ],
                // ];

                // $menuItems[] = ['label' => '<i class="fa fa-database"></i><span class="label label-success">'.Menu::getCountMenu().'</span>',
                //     'items' => [
                //          ['label' => '<span class="label label-success">Total Menu equal : '.Menu::getCountMenu().'</span>', 'url' => '#'],
                //     ],
                // ];
                    }
                } 

                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav  navbar-left'],
                    'items' => $menuItems,
                    'activateParents' => true,
                    'encodeLabels' => false,
                ]);
                NavBar::end();
                ?>
      </header>
       <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <?php
              /* componen user*/
               $profile = Yii::$app->user->identity->img_profile;
               $jenis_kelamin = Yii::$app->user->identity->jenis_kelamin;
              if($profile)
              {
                $image = Yii::$app->getHomeUrl().'image/'.$profile;
              }elseif($profile == '' && $jenis_kelamin == 1 ){
                $image = Yii::$app->getHomeUrl().'image/img_default_male.jpg';
              }elseif($profile == '' && $jenis_kelamin == 0 ) {
                # code...
                $image = Yii::$app->getHomeUrl().'image/img_default_female.png';
              }
               ?>
               <?= Html::img($image,['class'=>'img-circle']) ?>
            </div>
            <div class="pull-left info">
              <p><?php echo  $username = Yii::$app->user->identity->username ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <?php
         $callback = function($menu){
    $data = $menu['data'];
    return [
        'label' => $menu['name'],
        'url' => [$menu['route']],
        'options' => [$data],
        'icon' => $data,
        'items' => $menu['children'],
    ];
};

    $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback, true);

    ?>

   <?=
   dmstr\widgets\Menu::widget([
       'options' => ['class' => 'sidebar-menu'],
       'encodeLabels' => false,
       'items' => $items
    ]);
    ?>


            ?>
            

        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="background-color:white;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>

        <!-- Main content -->
        <section class="content">


            <?= $content ?>

            </section>
        </div>
    </div>

    <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?= $this->endBody() ?>
</body>