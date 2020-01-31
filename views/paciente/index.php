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
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

                    'id',
            'nombre',
            'fecha_nacimiento',
            'dni',
            'telefono',
            //'domicilio',
            //'fecha_ingreso',
            //'datos_padre:ntext',
            //'datos_madre:ntext',
            //'familiar_responsable',
            //'derivador_por',
            //'hospital',
            //'id_usuario',
            //'id_obra_social',

        ['class' => 'yii\grid\ActionColumn',
        'template' => '{view} {update}',
        ],
        ]
        ]); ?>
    
        <?php Pjax::end(); ?>

</div>
