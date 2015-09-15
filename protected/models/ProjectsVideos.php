<?php

/**
 * This is the model class for table "projects_videos".
 *
 * The followings are the available columns in table 'projects_videos':
 * @property string $id
 * @property string $link
 * @property string $project_id
 * @property string $order
 */
class ProjectsVideos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProjectsVideos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projects_videos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('link, project_id, order', 'required'),
			array('link', 'length', 'max'=>1024),
			array('project_id, order', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, link, project_id, order', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'link' => 'Link',
			'project_id' => 'Project',
			'order' => 'Order',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('order',$this->order,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}