<?php

namespace backend\modules\api\models;

use Yii;

/**
 * This is the model class for table "moms".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $file
 * @property string|null $fileName
 *
 * @property Childrens[] $childrens
 */
class Moms2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'moms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 20],
            [['surname'], 'string', 'max' => 25],
            [['file', 'fileName'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'file' => 'File',
            'fileName' => 'File Name',
        ];
    }

    /**
     * Gets query for [[Childrens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChildrens()
    {
        return $this->hasMany(Childrens::class, ['momsID' => 'id']);
    }
}
