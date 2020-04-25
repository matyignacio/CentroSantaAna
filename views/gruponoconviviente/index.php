<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GruponoconvivienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grupo No Convivientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupo-no-conviviente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuevo Grupo No Conviviente', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'nombre',
            'parentesco',
            'edad',
            'escolaridad',
            //'laboral',
            //'id_obra_social',
            //'id_paciente_trabajo_social',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
            ],
        ]
    ]);
    ?>


</div>
