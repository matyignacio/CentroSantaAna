<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PacienteTrabajoSocial */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Paciente Trabajo Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="paciente-trabajo-social-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
        'confirm' => 'Esta seguro que desea eliminar este item?',
        'method' => 'post',
        ],
        ]) ?>
    </p>

    <?= DetailView::widget([
    'model' => $model,
    'condensed' => true,
    'hover' => true,
    'buttons1' => '',
    'mode' => DetailView::MODE_VIEW,
    'panel' => [
    'heading' => 'Paciente Trabajo Socials'  . $model->id,
    'type' => DetailView::TYPE_PRIMARY,
    ],
    'attributes' => [
    [
                'columns' => [
                        [
                        'attribute' => 'id',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
[
                'columns' => [
                        [
                        'attribute' => 'vivienda',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
[
                'columns' => [
                        [
                        'attribute' => 'aspecto_economico',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
[
                'columns' => [
                        [
                        'attribute' => 'problematicas_salud',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
[
                'columns' => [
                        [
                        'attribute' => 'diagnostico',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
[
                'columns' => [
                        [
                        'attribute' => 'medico_cabecera',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
[
                'columns' => [
                        [
                        'attribute' => 'actividades',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
[
                'columns' => [
                        [
                        'attribute' => 'conclusion',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
[
                'columns' => [
                        [
                        'attribute' => 'id_paciente',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
    ],
    ]) ?>

</div>
