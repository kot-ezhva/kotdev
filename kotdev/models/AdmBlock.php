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
        return array(
            array('name, model, multiple, visible, table_name, widget', 'required'),
            array('sequence, multiple, visible', 'numerical', 'integerOnly' => true),
            array('name, model, table_name', 'length', 'max' => 255),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
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
            'name' => 'Название',
            'sequence' => 'Порядок',
            'model' => 'Имя модели',
            'multiple' => 'Множественный блок',
            'visible' => 'Видимость',
            'table_name' => 'Таблица в БД',
            'widget' => 'Путь до виджета',
        );
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
