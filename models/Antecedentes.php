<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "antecedentes".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property AntecedentePaciente[] $antecedentePacientes
 */
class Antecedentes extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'antecedentes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAntecedentePacientes() {
        return $this->hasMany(AntecedentePaciente::className(), ['id_antecedente' => 'id']);
    }

}
