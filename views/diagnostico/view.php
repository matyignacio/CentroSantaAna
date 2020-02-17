<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Diagnostico */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="diagnostico-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar este item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'condensed' => true,
        'hover' => true,
        'buttons1' => '',
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => 'Diagnosticos' . $model->id,
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
                        'attribute' => 'fecha',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'resumen:ntext',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
            [
                'columns' => [
                    [
                        'attribute' => 'is_sensible',
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
            [
                'columns' => [
                    [
                        'attribute' => 'id_usuario',
                        'labelColOptions' => ['style' => 'width:10%'],
                        'valueColOptions' => ['style' => 'width:23%'],
                    ],
                ],
            ],
        ],
    ])
    ?>

</div>
