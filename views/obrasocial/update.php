<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ObraSocial */

$this->title = 'Actualizar Obra Social: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Obra Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="obra-social-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
