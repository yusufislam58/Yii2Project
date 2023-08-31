<?php

namespace frontend\models;

use backend\modules\api\models\Mom;
use Yii;

/**
 * This is the model class for table "moms".
 *
 * @property int $id
 * * @property string $name
 * * @property int $childrenCount
 * @property string|null $surname
 * @property string|null $file
 *
 * @property Childrens[] $childrens
 */
class Moms extends \yii\db\ActiveRecord
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
            [['name','surname'], 'required'],
            [['name'],'string', 'max' => 20],
            [['surname'], 'string', 'max' => 25],
            [['id','childrenCount'], 'integer'],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg,txt'],
        ];
    }


    /**
     * {@inheritdoc}
     */



    public function getChildrensNames(){
        $children = $this->childrens;
        $childNames = [];
        foreach ($children as $child) {
            $childNames[] =  '( '.$child->name. ' '.$child->surname.' )' ;
        }
            return implode(' , ', $childNames);

    }
    public function getChildsCount(){
        $children=$this->getChildrens()->count();
        return $children;
       $this->childrenCount=$children;
       $this->save();
    }



    public function getChildrensId(){
        $children = $this->childrens;
        $childNames = [];
        foreach ($children as $child) {
            $childNames[] =  $child->id;
        }
        return implode(', ', $childNames);
    }




    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'childrensNames'=>'Çoçuklar',
            'childrensId'=>'ÇocukId',
            'childsCount'=>'Sahip olduğu çoçuk sayısı',
            'file' =>'file',
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
