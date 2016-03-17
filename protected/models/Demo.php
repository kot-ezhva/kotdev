<?php

/**
 * This is the model class for table "demo".
 *
 * The followings are the available columns in table 'demo':
 * @property integer $id_demo
 * @property string $phone
 * @property string $title
 * @property string $subtitle
 */
class Demo extends CActiveRecord
{
	public function tableName()
	{
		return 'demo';
	}

	public function rules()
	{
		return array(
			array('phone, title', 'required'),
			array('phone, title', 'length', 'max'=>255),
			array('subtitle', 'safe'),
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
			'id_demo' => 'Id Demo',
			'phone' => 'Номер телефона',
			'title' => 'Заголовок',
			'subtitle' => 'Подзаголовок',
		);
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
