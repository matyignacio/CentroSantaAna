<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PacienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pacientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuevo Paciente', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'nombre',
                'filterInputOptions' => [
                    'class' => 'form-control',
                    'placeholder' => 'Buscar por nombre...'
                ]
            ],
            [
                'attribute' => 'dni',
                'filterInputOptions' => [
                    'class' => 'form-control',
                    'placeholder' => 'Buscar por DNI...'
                ]
            ],
            [
                'attribute' => 'telefono',
                'filterInputOptions' => [
                    'class' => 'form-control',
                    'placeholder' => 'Buscar por telefono...'
                ]
            ],
            [
                'attribute' => 'obra',
                'label' => 'Obra Social',
                'value' => 'obraSocial.nombre',
                'filterInputOptions' => [
                    'class' => 'form-control',
                    'placeholder' => 'Buscar por obra social...'
                ]
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
            ],
        ]
    ]);
    ?>

    <?php Pjax::end(); ?>

</div>
