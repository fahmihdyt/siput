<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "result_media".
 *
 * @property integer $id
 * @property integer $id_publikasi
 * @property string $description
 * @property string $links
 *
 * @property PublikasiMedia $idPublikasi
 */
class ResultMedia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'result_media';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_publikasi'], 'integer'],
            [['description', 'links'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_publikasi' => 'Id Publikasi',
            'description' => 'Description',
            'links' => 'File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPublikasi()
    {
        return $this->hasOne(PublikasiMedia::className(), ['id' => 'id_publikasi']);
    }
}
