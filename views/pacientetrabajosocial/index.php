<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PacientetrabajosocialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paciente Trabajo Socials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-trabajo-social-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuevo Paciente Trabajo Social', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'vivienda',
            'aspecto_economico',
            'problematicas_salud',
            'diagnostico',
            //'medico_cabecera',
            //'actividades',
            //'conclusion',
            //'id_paciente',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
            ],
        ]
    ]);
    ?>


</div>
