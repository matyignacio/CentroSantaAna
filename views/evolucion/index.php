<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EvolucionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Evoluciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evolucion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nueva Evolucion', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'fecha',
            'resumen:ntext',
            //'is_sensible',
            'id_paciente',
            //'id_usuario',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
            ],
        ]
    ]);
    ?>

    <?php Pjax::end(); ?>

</div>
