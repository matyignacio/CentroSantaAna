<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GrupoNoConviviente */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Grupo No Convivientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="grupo-no-conviviente-view">

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
    'heading' => 'Grupo No Convivientes'  . $model->id,
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
                        'attribute' => 'nombre',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
[
                'columns' => [
                        [
                        'attribute' => 'parentesco',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
[
                'columns' => [
                        [
                        'attribute' => 'edad',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
[
                'columns' => [
                        [
                        'attribute' => 'escolaridad',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
[
                'columns' => [
                        [
                        'attribute' => 'laboral',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
[
                'columns' => [
                        [
                        'attribute' => 'id_obra_social',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
[
                'columns' => [
                        [
                        'attribute' => 'id_paciente_trabajo_social',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
    ],
    ]) ?>

</div>
