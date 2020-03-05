<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Paciente;

/**
 * PacienteSearch represents the model behind the search form of `app\models\Paciente`.
 */
class PacienteSearch extends Paciente {

    /**
     * {@inheritdoc}
     */
    public $obra;

    public function rules() {
        return [
            [['id', 'dni', 'id_usuario', 'id_obra_social'], 'integer'],
            [['nombre', 'fecha_nacimiento', 'telefono', 'domicilio', 'fecha_ingreso',
            'datos_padre', 'datos_madre', 'familiar_responsable', 'derivador_por',
            'hospital', 'obra'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = Paciente::find();

        // add conditions that should always apply here
        $query->joinWith(['obra']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['obra'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['obra_social.nombre' => SORT_ASC],
            'desc' => ['obra_social.nombre' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'dni' => $this->dni,
            'fecha_ingreso' => $this->fecha_ingreso,
            'id_usuario' => $this->id_usuario,
            'id_obra_social' => $this->id_obra_social,
        ]);

        $query->andFilterWhere(['like', 'paciente.nombre', $this->nombre])
                ->andFilterWhere(['like', 'obra_social.nombre', $this->obra])
                ->andFilterWhere(['like', 'telefono', $this->telefono])
                ->andFilterWhere(['like', 'domicilio', $this->domicilio])
                ->andFilterWhere(['like', 'datos_padre', $this->datos_padre])
                ->andFilterWhere(['like', 'datos_madre', $this->datos_madre])
                ->andFilterWhere(['like', 'familiar_responsable', $this->familiar_responsable])
                ->andFilterWhere(['like', 'derivador_por', $this->derivador_por])
                ->andFilterWhere(['like', 'hospital', $this->hospital]);

        return $dataProvider;
    }

}
