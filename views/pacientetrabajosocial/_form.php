<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PacienteTrabajoSocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paciente-trabajo-social-form">

    <?php
    $findAll = [];
    $findAllNoConviviente = []; // ARRAY DE TODOS LOS "MODELS AUXILIARES" EN CASO DE QUE SEA UN UPDATE
    // DEFINIMOS LA RUTA PARA INSERTAR UN NUEVO SERVICIO O PARA ACTUALIZAR SI YA EXISTE
    // LO HACEMOS ANTES DEL FORM BEGIN PARA PODER SETEAR LA RUTA
    if ($model->id > 0) { //UPDATE
        $ruta = "/pacientetrabajosocial/actualizar";
    } else { //CREATE
        $ruta = "/pacientetrabajosocial/create";
    }
    $form = ActiveForm::begin([
                'id' => 'pacientetrabajosocial-form',
                'enableClientValidation' => true,
                'action' => yii\helpers\Url::to([$ruta]),
    ]);
    ?>
    <fieldset>
        <table class="table table-condensed">
            <tr>
                <td width="50%">  
                    <?= $form->field($model, 'vivienda')->textInput(['maxlength' => true]) ?>
                </td>
                <td width="50%">  
                    <?= $form->field($model, 'aspecto_economico')->textInput(['maxlength' => true]) ?>
                </td>
            </tr>
            <tr>
                <td>  
                    <?= $form->field($model, 'problematicas_salud')->textInput(['maxlength' => true]) ?>
                </td>
                <td>  
                    <?= $form->field($model, 'diagnostico')->textInput(['maxlength' => true]) ?>
                </td>
            </tr>
            <tr>
                <td>  
                    <?= $form->field($model, 'medico_cabecera')->textInput(['maxlength' => true]) ?>
                </td>
                <td>  
                    <?= $form->field($model, 'actividades')->textInput(['maxlength' => true]) ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">  
                    <?= $form->field($model, 'conclusion')->textarea(['rows' => 4]) ?>
                    <?= $form->field($model, 'id_paciente')->hiddenInput(['value' => $_GET['id_paciente']])->label(false); ?>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>
            <?php
// new button
            echo Html::a('Agregar Grupo Conviviente', 'javascript:void(0);', [
                'id' => 'nuevo_grupo_conviviente',
                'class' => 'pull-right btn btn-danger btn-xs'
            ])
            ?>
        </legend>
        <?php
        // modelAuxiliar table
        $pacientegrupoconviviente = new \app\models\GrupoConviviente();
        $pacientegrupoconviviente->loadDefaultValues();
        echo '<table id="paciente-grupo-conviviente" class="table table-condensed">';
        echo '<thead>';
        echo '</thead>';
        echo '<tbody>';

        if ($model->id > 0) { //UPDATE 
            foreach ($findAll as $id => $_pacientegrupoconviviente) {
                echo '<tr>';
                echo $this->render('_form-grupo-conviviente', [
                    'key' => $_pacientegrupoconviviente->id,
                    'form' => $form,
                    'pacientegrupoconviviente' => $_pacientegrupoconviviente,
                ]);
                echo '</tr>';
            }
            foreach ($findAllNoConviviente as $id => $_pacientegruponoconviviente) {
                echo '<tr>';
                echo $this->render('_form-grupo-no-conviviente', [
                    'key' => $_pacientegruponoconviviente->id,
                    'form' => $form,
                    'pacientegruponoconviviente' => $_pacientegruponoconviviente,
                ]);
                echo '</tr>';
            }
        }

        // new fields
        echo '<tr id="nuevo_grupo_conviviente_block" style="display: none;">';
        echo $this->render('_form-grupo-conviviente', [
            'key' => '__id__',
            'form' => $form,
            'pacientegrupoconviviente' => $pacientegrupoconviviente,
        ]);
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        ?>

        <?php ob_start(); // output buffer the javascript to register later        ?>
        <script>

            // add button
            var model_auxiliar_k = <?php echo isset($key) ? str_replace('Nuevo', '', $key) : 0; ?>;
            $('#nuevo_grupo_conviviente').on('click', function () {
                model_auxiliar_k += 1;
                $('#paciente-grupo-conviviente').find('tbody')
                        .append('<tr>' + $('#nuevo_grupo_conviviente_block').html().replace(/__id__/g, 'nuevo' + model_auxiliar_k) + '</tr>');
            });

            // remove button
            $(document).on('click', '.eliminar_grupo_conviviente_button', function () {
                $(this).closest('tbody tr').remove();
            });

        </script>
        <?php $this->registerJs(str_replace(['<script>', '</script>'], '', ob_get_clean())); ?>

    </fieldset>
    <fieldset>
        <legend>
            <?php
// new button
            echo Html::a('Agregar Grupo No Conviviente', 'javascript:void(0);', [
                'id' => 'nuevo_grupo_no_conviviente',
                'class' => 'pull-right btn btn-danger btn-xs'
            ])
            ?>
        </legend>
        <?php
        // modelAuxiliar table
        $pacientegruponoconviviente = new \app\models\GrupoNoConviviente();
        $pacientegruponoconviviente->loadDefaultValues();
        echo '<table id="paciente-grupo-no-conviviente" class="table table-condensed">';
        echo '<thead>';
        echo '</thead>';
        echo '<tbody>';

        if ($model->id > 0) { //UPDATE 
            foreach ($findAllNoConviviente as $id => $_pacientegruponoconviviente) {
                echo '<tr>';
                echo $this->render('_form-grupo-no-conviviente', [
                    'key' => $_pacientegruponoconviviente->id,
                    'form' => $form,
                    'pacientegruponoconviviente' => $_pacientegruponoconviviente,
                ]);
                echo '</tr>';
            }
        }

        // new fields
        echo '<tr id="nuevo_grupo_no_conviviente_block" style="display: none;">';
        echo $this->render('_form-grupo-no-conviviente', [
            'key' => '__id__',
            'form' => $form,
            'pacientegruponoconviviente' => $pacientegruponoconviviente,
        ]);
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        ?>

        <?php ob_start(); // output buffer the javascript to register later        ?>
        <script>

            // add button
            var grupo_no_conviviente_k = <?php echo isset($key) ? str_replace('Nuevo', '', $key) : 0; ?>;
            $('#nuevo_grupo_no_conviviente').on('click', function () {
                grupo_no_conviviente_k += 1;
                $('#paciente-grupo-no-conviviente').find('tbody')
                        .append('<tr>' + $('#nuevo_grupo_no_conviviente_block').html().replace(/__id__/g, 'nuevo' + grupo_no_conviviente_k) + '</tr>');
            });

            // remove button
            $(document).on('click', '.eliminar_grupo_no_conviviente_button', function () {
                $(this).closest('tbody tr').remove();
            });

        </script>
        <?php $this->registerJs(str_replace(['<script>', '</script>'], '', ob_get_clean())); ?>

    </fieldset>

    <?= Html::input('submit', null, 'Guardar', ['class' => 'btn btn-primary', 'onclick' => 'return validateForms();']); ?>

    <?php ActiveForm::end(); ?>

</div>
