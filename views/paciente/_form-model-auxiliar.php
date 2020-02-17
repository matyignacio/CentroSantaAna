<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>
<td style="width: 33%">
    <?=
    $form->field($pacienteantecedente, 'id_antecedente')->dropDownList(
            ArrayHelper::map(app\models\Antecedentes::find()->orderBy('nombre')->all(), 'id', function($pacienteantecedente) {
                return $pacienteantecedente['nombre'];
            }), [
        'id' => "Pacienteantecedentes_{$key}_id_antecedente",
        'name' => "Pacienteantecedentes[$key][id_antecedente]"
    ])->label('Antecedente');
    ?>
</td>
<td style="width: 13%">
    <br>
    <?=
    Html::a('Quitar ' . $key, 'javascript:void(0);', [
        'class' => 'eliminar_model_auxiliar_button btn btn-danger btn-xs',
    ])
    ?>
</td>