<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Diagnostico;

/**
 * DiagnosticoSearch represents the model behind the search form of `app\models\Diagnostico`.
 */
class DiagnosticoSearch extends Diagnostico {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'is_sensible', 'id_paciente', 'id_usuario'], 'integer'],
            [['fecha', 'resumen'], 'safe'],
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
        $query = Diagnostico::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'fecha' => $this->fecha,
            'is_sensible' => $this->is_sensible,
            'id_paciente' => $this->id_paciente,
            'id_usuario' => $this->id_usuario,
        ]);

        $query->andFilterWhere(['like', 'resumen', $this->resumen]);

        return $dataProvider;
    }

}
