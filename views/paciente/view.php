<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Paciente */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
// EXTRAEMOS TODOS LOS modelosAuxiliares QUE ESTEN RELACIONADOS CON ESTE modelo
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
                <?php
                if (User::isTerapeuta(Yii::$app->user->identity->id)) {
                    // EN EL PRIMER IF EVALUO SI EL USUARIO LOGUEADO ES UN USUARIO TERAPEUTA
                    if ($pacienteTrabajoSocial = \app\models\PacienteTrabajoSocial::findOne([
                                'id_paciente' => $model->id
                            ])) {
                        // EN ESTE SEGUNDO IF EVALUO SI EL PACIENTE YA TIENE CARGADO
                        // SU RESPECTIVO FORMULARIO DE TRABAJO SOCIAL
                        // PARA DIRECCIONAR AL CREATE O AL UPDATE DEPENDIENDO DEL CASO
                        ?>
                        <?=
                        Html::a('Formulario terapeuta', ['/pacientetrabajosocial/update?id=' . $pacienteTrabajoSocial->id
                            . '&id_paciente=' . $model->id], ['class' => 'btn btn-primary'])
                        // AL UPDATE
                        ?> 
                    <?php } else { ?>
                        <?= Html::a('Formulario terapeuta', ['/pacientetrabajosocial/create', 'id_paciente' => $model->id], ['class' => 'btn btn-primary']) ?> 
                        <?php
                        // AL CREATE
                    }
                }
                ?>
            </td>
            <td align="right" width="33%">
                <?php
                echo Html::a('Nuevo informe de evolución', ['/evolucion/create'], [
                    'class' => 'btn btn-primary',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Nuevo informe de evolución'
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
