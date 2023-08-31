<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "childrens".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property int|null $momsID
 *
 * @property Moms $moms
 */
class Childrens extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'childrens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['momsID'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['surname'], 'string', 'max' => 25],
            [['momsID'], 'exist', 'skipOnError' => true, 'targetClass' => Moms::class, 'targetAttribute' => ['momsID' => 'id']],
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
            'momsID' => 'Moms ID',
        ];
    }

    /**
     * Gets query for [[Moms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMoms()
    {
        return $this->hasOne(Moms::class, ['id' => 'momsID']);
    }
}
