<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PacienteTrabajoSocial */

$this->title = 'Planilla Paciente';
$this->params['breadcrumbs'][] = ['label' => 'Paciente Trabajo Social', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-trabajo-social-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
