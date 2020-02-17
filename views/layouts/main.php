<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Ingresar', 'items' => [
                        ['label' => 'Iniciar sesion.', 'url' => ['/site/login'],
                            'linkOptions' => ['data-method' => 'post'],],
                ]];
            } else {
                if (Yii::$app->user->identity->role == 2) {
                    // Si el usuario es administrador, vera este menu
                    $menuItems[] = [
                        'label' => 'Administrar',
                        'items' => [
                            '<li class="dropdown-header">Antecedentes</li>',
                            ['label' => 'Buscar antecedentes', 'url' => ['/antecedentes']],
                            ['label' => 'Nuevo antecedente', 'url' => ['/antecedentes/create']],
                            '<li class="dropdown-header">Obra Social</li>',
                            ['label' => 'Buscar Obra Social', 'url' => ['/obrasocial']],
                            ['label' => 'Nueva Obra Social', 'url' => ['/obrasocial/create']],
                            '<li class="dropdown-header">Profesion</li>',
                            ['label' => 'Buscar Profesion', 'url' => ['/profesion']],
                            ['label' => 'Nueva Profesion', 'url' => ['/profesion/create']],
                        ],
                    ];
                }
                $menuItems[] = [
                    'label' => 'Pacientes',
                    'items' => [
                        ['label' => 'Buscar pacientes', 'url' => ['/paciente']],
                        ['label' => 'Nuevo paciente', 'url' => ['/paciente/create']],
                    ],
                ];
                $menuItems[] = [
                    'label' => 'Salir (' . Yii::$app->user->identity->username . ')',
                    'items' => [
                        '<li class="dropdown-header">Sesion</li>',
                        ['label' => 'Cerrar sesion', 'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post'],],
                        '<li class="dropdown-header">Administracion</li>',
                        ['label' => 'Crear nuevo usuario', 'url' => ['/site/register']],
                    ],
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; Centro Santa Ana <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
