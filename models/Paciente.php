<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente".
 *
 * @property int $id
 * @property string $nombre
 * @property string $fecha_nacimiento
 * @property int $dni
 * @property string $telefono
 * @property string $domicilio
 * @property string $fecha_ingreso
 * @property string $datos_padre
 * @property string $datos_madre
 * @property string $familiar_responsable
 * @property string $derivador_por
 * @property string $hospital
 * @property int $id_usuario
 * @property int $id_obra_social
 *
 * @property AntecedentePaciente[] $antecedentePacientes
 * @property Diagnostico[] $diagnosticos
 * @property Informe[] $informes
 * @property ObraSocial $obraSocial
 * @property User $usuario
 */
class Paciente extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'paciente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['nombre', 'fecha_nacimiento', 'dni', 'domicilio'], 'required'],
            [['fecha_nacimiento', 'fecha_ingreso', 'vigencia_certificado'], 'safe'],
            [['dni', 'id_usuario', 'id_obra_social', 'certificado_discapacidad'], 'integer'],
            [['datos_padre', 'datos_madre', 'estado_civil', 'escolaridad', 'nombre_escuela'], 'string'],
            [['nombre', 'familiar_responsable', 'derivador_por', 'hospital', 'nombre_escuela'], 'string', 'max' => 45],
            [['estado_civil'], 'string', 'max' => 20],
            [['escolaridad'], 'string', 'max' => 15],
            [['telefono'], 'string', 'max' => 30],
            [['domicilio'], 'string', 'max' => 150],
            [['id_obra_social'], 'exist', 'skipOnError' => true, 'targetClass' => ObraSocial::className(), 'targetAttribute' => ['id_obra_social' => 'id']],
                // A ESTE LO COMENTO PORQUE USER NO ES UN MODELO COMUN, ENTONCES NO TIENE EL METODO FIND[['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'fecha_nacimiento' => 'Fecha de nacimiento',
            'dni' => 'DNI',
            'telefono' => 'Telefono',
            'domicilio' => 'Domicilio',
            'fecha_ingreso' => 'Fecha de ingreso',
            'datos_padre' => 'Datos del padre',
            'datos_madre' => 'Datos de la madre',
            'estado_civil' => 'Estado Civil',
            'certificado_discapacidad' => 'Certificado de discapacidad',
            'vigencia_certificado' => 'Vigencia del certificado',
            'escolaridad' => 'Escolaridad',
            'nombre_escuela' => 'Nombre de la escuela',
            'familiar_responsable' => 'Familiar Responsable',
            'derivador_por' => 'Derivador Por',
            'hospital' => 'Hospital',
            'id_usuario' => 'Profesional a cargo',
            'id_obra_social' => 'Obra Social',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAntecedentePacientes() {
        return $this->hasMany(AntecedentePaciente::className(), ['id_paciente' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnosticos() {
        return $this->hasMany(Diagnostico::className(), ['id_paciente' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInformes() {
        return $this->hasMany(Informe::className(), ['id_paciente' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObraSocial() {
        return $this->hasOne(ObraSocial::className(), ['id' => 'id_obra_social']);
    }

    public function getObra() {
        return $this->hasOne(ObraSocial::className(), ['id' => 'id_obra_social']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario() {
        return $this->hasOne(Users::className(), ['id' => 'id_usuario']);
    }

}
