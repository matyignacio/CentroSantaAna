<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Paciente */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
// EXTRAEMOS TODOS LOS Presupuestoservicios QUE ESTEN RELACIONADOS CON ESTE SERVICIO 
$findAll = app\models\AntecedentePaciente::find()
        ->where('id_paciente = :id_paciente', [':id_paciente' => $model->id])
        ->all();
\yii\web\YiiAsset::register($this);
?>
<div class="paciente-view">

    <h3><?php
        try {
            echo $msg;
        } catch (Exception $ex) {
            
        }
        ?></h3>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <table class="table" width="100%">
        <tr>
            <td align="left" width="33%">
                <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </td>
            <td align="center" width="33%">

            </td>
            <td align="right" width="33%">
                <?php
                echo Html::a('<i class="fa glyphicon glyphicon-print"></i> Informe', ['/paciente/imprimir?id=' . $model->id], [
                    'class' => 'btn btn-warning',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Informe'
                ]);
                ?>
            </td>
        </tr>
    </table>
</p>

<?=
DetailView::widget([
    'model' => $model,
    'condensed' => true,
    'hover' => true,
    'buttons1' => '',
    'mode' => DetailView::MODE_VIEW,
    'panel' => [
        'heading' => 'Paciente ' . $model->nombre,
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
                [
                    'attribute' => 'nombre',
                    'labelColOptions' => ['style' => 'width:10%'],
                    'valueColOptions' => ['style' => 'width:23%'],
                ],
                [
                    'attribute' => 'dni',
                    'labelColOptions' => ['style' => 'width:10%'],
                    'valueColOptions' => ['style' => 'width:23%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'fecha_nacimiento',
                    'labelColOptions' => ['style' => 'width:10%'],
                    'valueColOptions' => ['style' => 'width:23%'],
                    'format' => 'date',
                ],
                [
                    'attribute' => 'telefono',
                    'labelColOptions' => ['style' => 'width:10%'],
                    'valueColOptions' => ['style' => 'width:23%'],
                ],
                [
                    'attribute' => 'domicilio',
                    'labelColOptions' => ['style' => 'width:10%'],
                    'valueColOptions' => ['style' => 'width:23%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'fecha_ingreso',
                    'labelColOptions' => ['style' => 'width:10%'],
                    'valueColOptions' => ['style' => 'width:23%'],
                    'format' => 'date',
                ],
                [
                    'attribute' => 'datos_padre',
                    'labelColOptions' => ['style' => 'width:10%'],
                    'valueColOptions' => ['style' => 'width:23%'],
                ],
                [
                    'attribute' => 'datos_madre',
                    'labelColOptions' => ['style' => 'width:10%'],
                    'valueColOptions' => ['style' => 'width:23%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'familiar_responsable',
                    'labelColOptions' => ['style' => 'width:10%'],
                    'valueColOptions' => ['style' => 'width:23%'],
                ],
                [
                    'attribute' => 'derivador_por',
                    'labelColOptions' => ['style' => 'width:10%'],
                    'valueColOptions' => ['style' => 'width:23%'],
                ],
                [
                    'attribute' => 'hospital',
                    'labelColOptions' => ['style' => 'width:10%'],
                    'valueColOptions' => ['style' => 'width:23%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'label' => 'Profesional a cargo',
                    'value' => $model->usuario->nombre,
                    'labelColOptions' => ['style' => 'width:10%'],
                    'valueColOptions' => ['style' => 'width:23%'],
                ],
                [
                    'label' => 'Obra social',
                    'value' => $model->obraSocial->nombre,
                    'labelColOptions' => ['style' => 'width:10%'],
                    'valueColOptions' => ['style' => 'width:23%'],
                ],
            ],
        ],
    ],
])
?>
<?php
foreach ($findAll as $pacienteantecedente) {
    ?>
    <?=
    DetailView::widget([
        'model' => $pacienteantecedente,
        'condensed' => true,
        'hover' => true,
        'buttons1' => '',
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => 'Antecedente: ' . $pacienteantecedente->antecedente->nombre,
            'type' => DetailView::TYPE_DANGER,
        ],
        'attributes' => [
            [
                'columns' => [
                ],
            ],
        ],
    ]);
    ?>
    <?php
}
?>
</div>
