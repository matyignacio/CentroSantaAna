<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use moonland\select2\Select2;
?>

<h3><?= $msg ?></h3>

<h1>Registrar usuario</h1>
<?php
$form = ActiveForm::begin([
            'method' => 'post',
            'id' => 'formulario',
            'enableClientValidation' => false,
            'enableAjaxValidation' => true,
        ]);
?>
<table class="table table-striped">
    <tr>
        <td colspan="2">
            <?= $form->field($model, "nombre")->input("text") ?>
        </td>
    </tr>
    <tr>
        <td>
            <?= $form->field($model, "username")->input("text")->label('Usuario') ?>
        </td>
        <td>
            <?= $form->field($model, "email")->input("email") ?>   
        </td>
    </tr>
    <tr>
        <td>
            <?= $form->field($model, "password")->input("password")->label('Clave') ?>   
        </td>
        <td>
            <?= $form->field($model, "password_repeat")->input("password")->label('Repetir clave') ?>   
        </td>
    </tr>
    <tr>
        <td>
            <?=
                    $form->field($model, 'role')->dropDownList(['1' => 'Usuario Comun', '2' => 'Administrador'],
                            ['prompt' => 'Seleccione una opcion'])
                    ->label('Rol');
            ?>   
        </td>
        <td>
            <?=
            $form->field($model, 'id_profesion')->dropDownList(ArrayHelper::map(app\models\Profesion::find()
                                    ->select('id, nombre')
                                    ->orderBy('nombre')
                                    ->all(), 'id', 'nombre'))->label('Profesion');
            ?>   

        </td>
    </tr>
</table>

<?= Html::submitButton("Registrar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>