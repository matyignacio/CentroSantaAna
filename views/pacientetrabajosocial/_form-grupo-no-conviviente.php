<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>
<td style="width: 30%">
    <?=
    $form->field($pacientegruponoconviviente, 'nombre')->textInput(['maxlength' => true,
        'id' => "Pacientegruponoconviviente_{$key}_nombre",
        'name' => "Pacientegruponoconviviente[$key][nombre]"
    ])
    ?>
    <?=
    $form->field($pacientegruponoconviviente, 'parentesco')->textInput(['maxlength' => true,
        'id' => "Pacientegruponoconviviente_{$key}_parentesco",
        'name' => "Pacientegruponoconviviente[$key][parentesco]"
    ])
    ?>
</td>
<td style="width: 30%">
    <?=
    $form->field($pacientegruponoconviviente, 'edad')->textInput([
        'id' => "Pacientegruponoconviviente_{$key}_edad",
        'name' => "Pacientegruponoconviviente[$key][edad]"
    ])
    ?>
    <?=
    $form->field($pacientegruponoconviviente, 'escolaridad')->textInput(['maxlength' => true,
        'id' => "Pacientegruponoconviviente_{$key}_escolaridad",
        'name' => "Pacientegruponoconviviente[$key][escolaridad]"])
    ?>
</td>
<td style="width: 30%">
    <?=
    $form->field($pacientegruponoconviviente, 'laboral')->textInput(['maxlength' => true,
        'id' => "Pacientegruponoconviviente_{$key}_laboral",
        'name' => "Pacientegruponoconviviente[$key][laboral]"
    ])
    ?>
    <?=
    $form->field($pacientegruponoconviviente, 'id_obra_social')->dropDownList(
            ArrayHelper::map(app\models\ObraSocial::find()->orderBy('nombre')->all(), 'id', function($pacientegruponoconviviente) {
                return $pacientegruponoconviviente['nombre'];
            }), [
        'id' => "Pacientegruponoconviviente_{$key}_id_obra_social",
        'name' => "Pacientegruponoconviviente[$key][id_obra_social]"
    ])->label('Obra Social')
    ?>
</td>
<td style="width: 10%">
    <br>
    <?=
    Html::a('Quitar ' . $key, 'javascript:void(0);', [
        'class' => 'eliminar_grupo_no_conviviente_button btn btn-danger btn-xs',
    ])
    ?>
</td>