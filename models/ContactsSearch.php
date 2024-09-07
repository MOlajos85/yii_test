<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contacts;

/**
 * ContactsSearch represents the model behind the search form of `app\models\Contacts`.
 */
class ContactsSearch extends Contacts
{
    /**
     * {@inheritdoc}
     */
    public $groupname;
    public function rules()
    {
        return [
            [['id', 'gender', 'status', 'sentstatus'], 'integer'],
            [['firstname', 'lastname', 'company', 'address', 'groupname','phone', 'mobile', 'fax', 'pemail', 'semail', 'country', 'websiteurl', 'birthday', 'addeddate', 'updateddate'], 'safe'],
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
        $query = Contacts::find()->innerJoinWith('groups', true);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['firstname', 'lastname', 'groupname', 'email', 'pemail']]
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
            'gender' => $this->gender,
            'status' => $this->status,
            'sentstatus' => $this->sentstatus,
            'addeddate' => $this->addeddate,
            'updateddate' => $this->updateddate,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'pemail', $this->pemail])
            ->andFilterWhere(['like', 'semail', $this->semail])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'websiteurl', $this->websiteurl])
            ->andFilterWhere(['like', 'birthday', $this->birthday])
            ->andFilterWhere(['like', 'groupname', $this->groupname]);

        return $dataProvider;
    }
}
