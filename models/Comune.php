<?php

/**
 * This is the model class for table "comune".
 *
 * The followings are the available columns in table 'comune':
 * @property integer $id
 * @property string $nome
 * @property integer $regione_id
 *
 * The followings are the available model relations:
 * @property Regione $regione
 */
class Comune extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Comune the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'comune';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nome, regione_id', 'required'),
            array('regione_id', 'numerical', 'integerOnly' => true),
            array('nome', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nome, regione_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'regione' => array(self::BELONGS_TO, 'Regione', 'regione_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'nome' => 'Nome',
            'regione_id' => 'Regione',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('nome', $this->nome, true);
        $criteria->compare('regione_id', $this->regione_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public static function getComune($regione_id, $arrayComuni = array())
    {
        $comuni = Comune::model()->findAll(array(
            'order' => 'nome',
            'condition' => 'regione_id=:regione_id',
            'params' => array(
                ':regione_id' => $regione_id
            )
                ));
        $arrayComuni[0] = 'Seleziona un comune';
        foreach ($comuni as $comune) {
            $arrayComuni[$comune->id] = $comune->nome;
        }
        return $arrayComuni;
    }

}