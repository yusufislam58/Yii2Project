<?php

namespace frontend\models;

use yii\data\ActiveDataProvider;
use yii\db\Query;
use frontend\models\Moms;

class MomGeneralSearchModel extends Moms
{

    public $generalSearch;


    public function rules()
    {
        return array_merge(parent::rules(),[
            [['generalSearch'], 'safe'],
        ]);
    }

    public function attributeLabels()
    {
        return parent::attributeLabels(); // TODO: Change the autogenerated stub
    }


    public function search($params)
    {

        $query = Moms::find()->joinWith('childrens');

        $dataProvider= new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if(!$this->validate()){
            $query->where('0=1');
        }
        $query->orFilterWhere(['like','moms.name',$this->generalSearch])
            ->orFilterWhere(['like','moms.surname',$this->generalSearch])
            ->orFilterWhere(['moms.id' => $this->generalSearch])
            ->orFilterWhere(['like','childrens.name',$this->generalSearch])
            ->orFilterWhere(['childrens.id'=>$this->generalSearch]);


//       $query->joinWith(['childrens'=> function($query){
//           $query->andFilterwhere(['like',$this->getChildName(),'childrenNames']);
//       }
//       ]);

        print_r($query->createCommand()->rawSql);

        return $dataProvider;
    }
}