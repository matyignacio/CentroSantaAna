<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ObraSocial */

$this->title = 'Actualizar Obra Social: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Obras Sociales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="obra-social-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
