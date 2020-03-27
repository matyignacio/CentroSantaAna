<?php

use yii\helpers\Html;
use app\models\Antecedentes;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use moonland\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Paciente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paciente-form">

    <?php
    $findAll = []; // ARRAY DE TODOS LOS "MODELS AUXILIARES" EN CASO DE QUE SEA UN UPDATE
    // DEFINIMOS LA RUTA PARA INSERTAR UN NUEVO SERVICIO O PARA ACTUALIZAR SI YA EXISTE
    // LO HACEMOS ANTES DEL FORM BEGIN PARA PODER SETEAR LA RUTA
    if ($model->id > 0) { //UPDATE
        $ruta = "/paciente/actualizar";
    } else { //CREATE
        $ruta = "/paciente/insertar";
    }
    $form = ActiveForm::begin([
                'action' => yii\helpers\Url::to([$ruta]),
    ]);
    // ACA VOLVEMOS A EVALUAR, PARA INSERTAR UN NUEVO ELEMENTO EN EL FORMULARIO QUE SERIA EL ID OCULTO
    if ($model->id > 0) { //UPDATE 
        ?>
        <input name="id" type="hidden" value="<?php echo $model->id ?>" />
        <?php
        $findAll = app\models\AntecedentePaciente::find()
                ->where('id_paciente = :id_paciente', [':id_paciente' => $model->id])
                ->all();
    }
    ?>
    <fieldset>
        <table class="table table-condensed">
            <tr>
                <td width="25%">  
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                </td>
                <td width="25%">  
                    <?php
                    echo $form->field($model, 'fecha_nacimiento')->widget(\kartik\datecontrol\DateControl::classname(), [
                        'type' => 'date',
                        'ajaxConversion' => true,
                        'autoWidget' => true,
                        'widgetClass' => '',
                        'displayFormat' => 'php:d-F-Y',
                        'saveFormat' => 'php:Y-m-d',
                        'widgetOptions' => [
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'php:d-F-Y',
                                'todayHighlight' => true
                            ]
                        ],
                        'language' => 'es'
                    ]);
                    ?>
                </td>
                <td width="25%">  
                    <?= $form->field($model, 'dni')->textInput() ?>
                </td>
                <td width="25%">  
                    <?php
                    echo $form->field($model, 'id_obra_social')->widget(Select2::className(), [
                        'items' => ArrayHelper::map(app\models\ObraSocial::find()
                                        ->select('id, nombre')
                                        ->orderBy('nombre')
                                        ->all(), 'id', function($model) {
                                    return $model['nombre'];
                                }
                        ),
                        'size' => Select2::SMALL,
                    ])->label('Obra Social');
                    ?>
                </td>
            </tr>
            <tr>    
                <td>  
                    <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>
                </td>
                <td>
                    <?=
                    $form->field($model, 'estado_civil')->dropDownList(['Soltero/a' => 'Soltero/a'
                        , 'Casado/a' => 'Casado/a'
                        , 'Divorciado/a' => 'Divorciado/a'
                        , 'Viudo/a' => 'Viudo/a'], ['prompt' => 'Seleccione una opcion']);
                    ?>   
                </td>
                <td>  
                    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
                </td>
                <td>  
                    <?php
                    echo $form->field($model, 'fecha_ingreso')->widget(\kartik\datecontrol\DateControl::classname(), [
                        'type' => 'date',
                        'ajaxConversion' => true,
                        'autoWidget' => true,
                        'widgetClass' => '',
                        'displayFormat' => 'php:d-F-Y',
                        'saveFormat' => 'php:Y-m-d',
                        'widgetOptions' => [
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'php:d-F-Y',
                                'todayHighlight' => true
                            ]
                        ],
                        'language' => 'es'
                    ]);
                    ?>
                </td>
            </tr>
            <tr>
                <td>  
                    <?= $form->field($model, 'datos_padre')->textarea(['rows' => 4]) ?>
                </td>
                <td>  
                    <?= $form->field($model, 'datos_madre')->textarea(['rows' => 4]) ?>
                </td>
                <td>  
                    <?= $form->field($model, 'familiar_responsable')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'id_usuario')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false); ?>
                </td>
                <td>  
                    <?= $form->field($model, 'hospital')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'derivador_por')->textInput(['maxlength' => true]) ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?=
                    $form->field($model, 'certificado_discapacidad')->dropDownList(['0' => 'No tiene'
                        , '1' => 'Si tiene'], ['prompt' => 'Seleccione una opcion']);
                    ?>   
                </td>
                <td>
                    <?php
                    echo $form->field($model, 'vigencia_certificado')->widget(\kartik\datecontrol\DateControl::classname(), [
                        'type' => 'date',
                        'ajaxConversion' => true,
                        'autoWidget' => true,
                        'widgetClass' => '',
                        'displayFormat' => 'php:d-F-Y',
                        'saveFormat' => 'php:Y-m-d',
                        'widgetOptions' => [
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'php:d-F-Y',
                                'todayHighlight' => true
                            ]
                        ],
                        'language' => 'es'
                    ]);
                    ?>
                </td>
                <td>
                    <?=
                    $form->field($model, 'escolaridad')->dropDownList(['Comun' => 'Común'
                        , 'Especial' => 'Especial'], ['prompt' => 'Seleccione una opcion']);
                    ?>   
                </td>
                <td>
                    <?= $form->field($model, 'nombre_escuela')->textInput(['maxlength' => true]) ?>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>
            <?php
// new button
            echo Html::a('Agregar Antecedente', 'javascript:void(0);', [
                'id' => 'nuevo_model_auxiliar_button',
                'class' => 'pull-right btn btn-danger btn-xs'
            ])
            ?>
        </legend>
        <?php
        // modelAuxiliar table
        $pacienteantecedente = new \app\models\AntecedentePaciente();
        $pacienteantecedente->loadDefaultValues();
        echo '<table id="paciente-antecedente" class="table table-condensed table-bordered">';
        echo '<thead>';
        echo '</thead>';
        echo '<tbody>';

        if ($model->id > 0) { //UPDATE 
            foreach ($findAll as $id => $_pacienteantecedente) {
                echo '<tr>';
                echo $this->render('_form-model-auxiliar', [
                    'key' => $_pacienteantecedente->id,
                    'form' => $form,
                    'pacienteantecedente' => $_pacienteantecedente,
                ]);
                echo '</tr>';
            }
        }


        // new fields
        echo '<tr id="nuevo_model_auxiliar_block" style="display: none;">';
        echo $this->render('_form-model-auxiliar', [
            'key' => '__id__',
            'form' => $form,
            'pacienteantecedente' => $pacienteantecedente,
        ]);
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        ?>

        <?php ob_start(); // output buffer the javascript to register later        ?>
        <script>

            // add button
            var model_auxiliar_k = <?php echo isset($key) ? str_replace('Nuevo', '', $key) : 0; ?>;
            $('#nuevo_model_auxiliar_button').on('click', function () {
                model_auxiliar_k += 1;
                $('#paciente-antecedente').find('tbody')
                        .append('<tr>' + $('#nuevo_model_auxiliar_block').html().replace(/__id__/g, 'nuevo' + model_auxiliar_k) + '</tr>');
            });

            // remove button
            $(document).on('click', '.eliminar_model_auxiliar_button', function () {
                $(this).closest('tbody tr').remove();
            });

        </script>
        <?php $this->registerJs(str_replace(['<script>', '</script>'], '', ob_get_clean())); ?>

    </fieldset>

    <?= Html::input('submit', null, 'Guardar', ['class' => 'btn btn-primary', 'onclick' => 'return validateForms();']); ?>


    <?php ActiveForm::end(); ?>

</div>
