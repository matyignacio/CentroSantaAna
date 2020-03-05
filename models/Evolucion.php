<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evolucion".
 *
 * @property int $id
 * @property string $fecha
 * @property string $resumen
 * @property int $is_sensible
 * @property int $id_paciente
 * @property int $id_usuario
 *
 * @property Paciente $paciente
 * @property User $usuario
 */
class Evolucion extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'evolucion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['fecha'], 'safe'],
            [['resumen'], 'string'],
            [['is_sensible', 'id_paciente', 'id_usuario'], 'integer'],
            [['id_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => Paciente::className(), 'targetAttribute' => ['id_paciente' => 'id']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'resumen' => 'Resumen',
            'is_sensible' => 'Es Sensible',
            'id_paciente' => 'Paciente',
            'id_usuario' => 'Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente() {
        return $this->hasOne(Paciente::className(), ['id' => 'id_paciente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario() {
        return $this->hasOne(Users::className(), ['id' => 'id_usuario']);
    }

}
