<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente_trabajo_social".
 *
 * @property int $id
 * @property string $vivienda
 * @property string $aspecto_economico
 * @property string $problematicas_salud
 * @property string $diagnostico
 * @property string $medico_cabecera
 * @property string $actividades
 * @property string $conclusion
 * @property int $id_paciente
 *
 * @property GrupoConviviente[] $grupoConvivientes
 * @property GrupoNoConviviente[] $grupoNoConvivientes
 * @property Paciente $paciente
 */
class PacienteTrabajoSocial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paciente_trabajo_social';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vivienda', 'aspecto_economico', 'problematicas_salud', 'diagnostico', 'medico_cabecera', 'actividades', 'conclusion'], 'required'],
            [['id_paciente'], 'integer'],
            [['vivienda', 'aspecto_economico', 'problematicas_salud', 'actividades'], 'string', 'max' => 150],
            [['diagnostico', 'conclusion'], 'string', 'max' => 500],
            [['medico_cabecera'], 'string', 'max' => 45],
            [['id_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['id_paciente' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vivienda' => 'Vivienda',
            'aspecto_economico' => 'Aspecto Economico',
            'problematicas_salud' => 'Problematicas Salud',
            'diagnostico' => 'Diagnostico',
            'medico_cabecera' => 'Medico Cabecera',
            'actividades' => 'Actividades',
            'conclusion' => 'Conclusion',
            'id_paciente' => 'Id Paciente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoConvivientes()
    {
        return $this->hasMany(GrupoConviviente::className(), ['id_paciente_trabajo_social' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoNoConvivientes()
    {
        return $this->hasMany(GrupoNoConviviente::className(), ['id_paciente_trabajo_social' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente()
    {
        return $this->hasOne(Paciente::className(), ['id' => 'id_paciente']);
    }
}
