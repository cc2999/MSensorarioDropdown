<?php

/**
 * This is the model class for table "regione".
 *
 * The followings are the available columns in table 'regione':
 * @property integer $id
 * @property string $nome
 * @property integer $stato_id
 *
 * The followings are the available model relations:
 * @property Comune[] $comunes
 * @property Stato $stato
 */
class Regione extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Regione the static model class
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
        return 'regione';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nome, stato_id', 'required'),
            array('stato_id', 'numerical', 'integerOnly' => true),
            array('nome', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nome, stato_id', 'safe', 'on' => 'search'),
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
            'comunes' => array(self::HAS_MANY, 'Comune', 'regione_id'),
            'stato' => array(self::BELONGS_TO, 'Stato', 'stato_id'),
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
            'stato_id' => 'Stato',
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
        $criteria->compare('stato_id', $this->stato_id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public static function getRegione($stato_id, $arrayRegioni = array())
    {
        $regioni = Regione::model()->findAll(array(
            'order' => 'nome',
            'condition' => 'stato_id=:stato_id',
            'params' => array(
                'stato_id' => $stato_id
            )
                ));
        $arrayRegioni[0] = 'Seleziona una regione';
        foreach ($regioni as $regione) {
            $arrayRegioni[$regione->id] = $regione->nome;
        }
        return $arrayRegioni;
    }

}