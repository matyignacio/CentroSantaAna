<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/**
 * @var $this \yii\base\View
 * @var $content string
 */
// $this->registerAssetBundle('app');
?>
<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <title><?php echo Html::encode($this->title); ?></title>
        <?php $this->head(); ?>

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>

        <!-- CSS  -->
        <link href="<?php echo $this->theme->baseUrl ?>/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?php echo $this->theme->baseUrl ?>/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="container">
                <?php
                NavBar::begin([
                    'brandLabel' => Yii::$app->name,
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => 'navbar-inverse navbar-fixed-top',
                    ],
                ]);
                $menuItems[] = [
                    'label' => 'Administracion',
                    'items' => [
                        ['label' => 'Analitos', 'url' => ['/analitos']],
                        ['label' => 'Clientes', 'url' => ['/clientes']],
                        ['label' => 'Muestras', 'url' => ['/muestras']],
                        ['label' => 'Servicios', 'url' => ['/servicios']],
                        ['label' => 'Tipo de muestra', 'url' => ['/tipomuestra']],
                        ['label' => 'Unidad de destino', 'url' => ['/unidaddestino']],
                    ],
                ];
                $menuItems[] = [
                    'label' => 'Presupuesto y Servicio',
                    'items' => [
                    ],
                ];
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => $menuItems,
                        /* 'items' => [
                          ['label' => 'Home', 'url' => ['/site/index']],
                          ['label' => 'About', 'url' => ['/site/about']],
                          ['label' => 'Contact', 'url' => ['/site/contact']],
                          Yii::$app->user->isGuest ? (
                          ['label' => 'Login', 'url' => ['/site/login']]
                          ) : (
                          '<li>'
                          . Html::beginForm(['/site/logout'], 'post')
                          . Html::submitButton(
                          'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                          )
                          . Html::endForm()
                          . '</li>'
                          )
                          ], */
                ]);
                NavBar::end();
                ?>
            </div>
        </nav>


        <div class="container" >
            <div class="section">
                <div class="row">
                    <div class="col s12 m12">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>


        <br><br>
    </div>

    <footer class="orange">
        <div class="container">
            <p class="pull-left white-text">&copy; IRePCySA <?= date('Y') ?></p>

            <p class="pull-right white-text"><?= Yii::powered() ?></p>
    </footer>  


    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="<?php echo $this->theme->baseUrl ?>/js/materialize.js"></script>
    <script src="<?php echo $this->theme->baseUrl ?>/js/init.js"></script>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage(); ?>