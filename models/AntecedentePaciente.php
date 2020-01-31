<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "antecedente_paciente".
 *
 * @property int $id
 * @property int $id_antecedente
 * @property int $id_paciente
 * @property string $observaciones
 *
 * @property Antecedente $antecedente
 * @property Paciente $paciente
 */
class AntecedentePaciente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'antecedente_paciente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_antecedente', 'id_paciente'], 'integer'],
            [['observaciones'], 'string'],
            [['id_antecedente'], 'exist', 'skipOnError' => true, 'targetClass' => Antecedentes::className(), 'targetAttribute' => ['id_antecedente' => 'id']],
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
            'id_antecedente' => 'Id Antecedente',
            'id_paciente' => 'Id Paciente',
            'observaciones' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAntecedente()
    {
        return $this->hasOne(Antecedentes::className(), ['id' => 'id_antecedente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente()
    {
        return $this->hasOne(Paciente::className(), ['id' => 'id_paciente']);
    }
}
