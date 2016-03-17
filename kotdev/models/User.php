<?php

class User extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'adm_user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('username, name', 'required'),
            array('name, username', 'length', 'max' => 120),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return [
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id_user' => 'Id User',
            'username' => 'Логин',
            'password' => 'Пароль',
            'name' => 'Имя пользователя',
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
