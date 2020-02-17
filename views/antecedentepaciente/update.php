<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AntecedentePaciente */

$this->title = 'Actualizar Antecedente Paciente: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Antecedente Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="antecedente-paciente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
