<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfesionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profesions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profesion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuevo Profesion', ['create'], ['class' => 'btn btn-primary']) ?>
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

        ['class' => 'yii\grid\ActionColumn',
        'template' => '{view} {update}',
        ],
        ]
        ]); ?>
    
        <?php Pjax::end(); ?>

</div>
