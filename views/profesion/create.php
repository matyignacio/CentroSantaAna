<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Profesion */

$this->title = 'Nueva Profesion';
$this->params['breadcrumbs'][] = ['label' => 'Profesiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profesion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
