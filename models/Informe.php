<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "informe".
 *
 * @property int $id
 * @property int $id_paciente
 * @property string $fecha
 *
 * @property Paciente $paciente
 */
class Informe extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'informe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_paciente'], 'integer'],
            [['fecha'], 'required'],
            [['fecha'], 'safe'],
            [['id_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['id_paciente' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'id_paciente' => 'Id Paciente',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente() {
        return $this->hasOne(Paciente::className(), ['id' => 'id_paciente']);
    }

}
