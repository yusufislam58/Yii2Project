<?php

namespace frontend\models;

use yii\data\ActiveDataProvider;

class ChildrensSearhModel extends Childrens
{

    public function rules()
    {
        return array_merge(parent::rules(),[
            [['id'], 'safe'],
        ]);
    }
    public function search($params)
    {



        $query = Childrens::find()->with('moms');

        $dataProvider= new ActiveDataProvider([
            'query' => $query
        ]);

        if($this->load($params) && !$this->validate()){
            return $dataProvider;
        }




        $query
            ->andFilterWhere(['id' => $this->id])
            ->andFilterWhere(['like','name',$this->name])
            ->andFilterWhere(['like','surname',$this->surname])
            ->andFilterWhere(['like','momsID',$this->momsID]);

        return $dataProvider;
    }
}