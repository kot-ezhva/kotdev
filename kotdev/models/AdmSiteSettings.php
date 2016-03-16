<?php

/**
 * This is the model class for table "adm_site_settings".
 *
 * The followings are the available columns in table 'adm_site_settings':
 * @property integer $id_settings
 * @property string $name
 * @property string $value
 * @property string $description
 */
class AdmSiteSettings extends CActiveRecord
{
    public function tableName()
    {
        return 'adm_site_settings';
    }

    public function rules()
    {
        return array(
            array('name, value', 'required'),
            array('name, value', 'length', 'max'=>255),
            array('description', 'safe'),
        );
    }

    public function relations()
    {
        return array(
        );
    }

    public function attributeLabels()
    {
        return array(
            'id_settings' => 'Id Settings',
            'name' => 'Имя',
            'value' => 'Значение',
            'description' => 'Описание',
        );
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}