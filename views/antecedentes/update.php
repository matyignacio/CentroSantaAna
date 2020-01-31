<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Antecedentes */

$this->title = 'Actualizar Antecedentes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Antecedentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="antecedentes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
