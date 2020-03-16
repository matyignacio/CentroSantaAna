<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo_conviviente".
 *
 * @property int $id
 * @property string $nombre
 * @property string $parentesco
 * @property int $edad
 * @property string $escolaridad
 * @property string $laboral
 * @property int $id_obra_social
 * @property int $id_paciente_trabajo_social
 *
 * @property ObraSocial $obraSocial
 * @property PacienteTrabajoSocial $pacienteTrabajoSocial
 */
class GrupoConviviente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grupo_conviviente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'parentesco', 'edad'], 'required'],
            [['edad', 'id_obra_social', 'id_paciente_trabajo_social'], 'integer'],
            [['nombre', 'parentesco', 'escolaridad', 'laboral'], 'string', 'max' => 45],
            [['id_obra_social'], 'exist', 'skipOnError' => true, 'targetClass' => ObraSocial::className(), 'targetAttribute' => ['id_obra_social' => 'id']],
            [['id_paciente_trabajo_social'], 'exist', 'skipOnError' => true, 'targetClass' => PacienteTrabajoSocial::className(), 'targetAttribute' => ['id_paciente_trabajo_social' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'parentesco' => 'Parentesco',
            'edad' => 'Edad',
            'escolaridad' => 'Escolaridad',
            'laboral' => 'Laboral',
            'id_obra_social' => 'Id Obra Social',
            'id_paciente_trabajo_social' => 'Id Paciente Trabajo Social',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObraSocial()
    {
        return $this->hasOne(ObraSocial::className(), ['id' => 'id_obra_social']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPacienteTrabajoSocial()
    {
        return $this->hasOne(PacienteTrabajoSocial::className(), ['id' => 'id_paciente_trabajo_social']);
    }
}
