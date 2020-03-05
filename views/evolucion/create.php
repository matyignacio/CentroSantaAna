<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Evolucion */

$this->title = 'Nueva Evolucion';
$this->params['breadcrumbs'][] = ['label' => 'Evoluciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evolucion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
