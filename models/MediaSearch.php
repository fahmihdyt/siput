<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Media;

/**
 * MediaSearch represents the model behind the search form about `app\models\Media`.
 */
class MediaSearch extends Media
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_event'], 'integer'],
            [['jenis', 'email', 'no_hp', 'target_peserta', 'media_publikasi', 'size', 'deadline', 'konten', 'warna', 'desain_kasar', 'attachment', 'status', 'penanggung_jawab'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Media::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_event' => $this->id_event,
            'deadline' => $this->deadline,
        ]);

        $query->andFilterWhere(['like', 'jenis', $this->jenis])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'target_peserta', $this->target_peserta])
            ->andFilterWhere(['like', 'media_publikasi', $this->media_publikasi])
            ->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'konten', $this->konten])
            ->andFilterWhere(['like', 'warna', $this->warna])
            ->andFilterWhere(['like', 'desain_kasar', $this->desain_kasar])
            ->andFilterWhere(['like', 'attachment', $this->attachment])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'penanggung_jawab', $this->penanggung_jawab]);

        return $dataProvider;
    }
}
