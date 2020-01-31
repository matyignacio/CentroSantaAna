<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AntecedentePaciente */

$this->title = 'Nuevo Antecedente Paciente';
$this->params['breadcrumbs'][] = ['label' => 'Antecedente Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antecedente-paciente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
