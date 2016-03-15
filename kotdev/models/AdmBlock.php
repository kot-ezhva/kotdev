<?php

/**
 * This is the model class for table "adm_block".
 *
 * The followings are the available columns in table 'adm_block':
 * @property integer $id_block
 * @property string $name
 * @property integer $sequence
 * @property string $model
 * @property integer $multiple
 * @property integer $visible
 * @property string $table_name
 */
class AdmBlock extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'adm_block';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, sequence, model, multiple, visible, table_name', 'required'),
            array('sequence, multiple, visible', 'numerical', 'integerOnly' => true),
            array('name, model, table_name', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_block, name, sequence, model, multiple, visible, table_name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return [
            'admAttributes' => [self::HAS_MANY, 'AdmAttribute', 'id_block'],
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id_block' => 'Id Block',
            'name' => 'Name',
            'sequence' => 'Sequence',
            'model' => 'Model',
            'multiple' => 'Multiple',
            'visible' => 'Visible',
            'table_name' => 'Table Name',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_block', $this->id_block);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('sequence', $this->sequence);
        $criteria->compare('model', $this->model, true);
        $criteria->compare('multiple', $this->multiple);
        $criteria->compare('visible', $this->visible);
        $criteria->compare('table_name', $this->table_name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return AdmBlock the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
