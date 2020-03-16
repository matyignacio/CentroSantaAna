<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PacienteTrabajoSocial;

/**
 * PacientetrabajosocialSearch represents the model behind the search form of `app\models\PacienteTrabajoSocial`.
 */
class PacientetrabajosocialSearch extends PacienteTrabajoSocial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_paciente'], 'integer'],
            [['vivienda', 'aspecto_economico', 'problematicas_salud', 'diagnostico', 'medico_cabecera', 'actividades', 'conclusion'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = PacienteTrabajoSocial::find();

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
            'id_paciente' => $this->id_paciente,
        ]);

        $query->andFilterWhere(['like', 'vivienda', $this->vivienda])
            ->andFilterWhere(['like', 'aspecto_economico', $this->aspecto_economico])
            ->andFilterWhere(['like', 'problematicas_salud', $this->problematicas_salud])
            ->andFilterWhere(['like', 'diagnostico', $this->diagnostico])
            ->andFilterWhere(['like', 'medico_cabecera', $this->medico_cabecera])
            ->andFilterWhere(['like', 'actividades', $this->actividades])
            ->andFilterWhere(['like', 'conclusion', $this->conclusion]);

        return $dataProvider;
    }
}
