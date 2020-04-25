<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GrupoNoConviviente */

$this->title = 'Nuevo Grupo No Conviviente';
$this->params['breadcrumbs'][] = ['label' => 'Grupo No Convivientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupo-no-conviviente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
