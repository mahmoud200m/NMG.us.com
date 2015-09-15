<?php

/**
 * This is the model class for table "projects".
 *
 * The followings are the available columns in table 'projects':
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $category
 */
class Projects extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Projects the static model class
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
		return 'projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, category', 'required'),
			array('name', 'length', 'max'=>1024),
			array('description', 'length', 'max'=>2048),
			array('category', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, category', 'safe', 'on'=>'search'),
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
            'photos' => array(self::HAS_MANY, 'ProjectsPhotos', 'project_id'),
            'videos' => array(self::HAS_MANY, 'ProjectsVideos', 'project_id'),
            'panoramas' => array(self::HAS_MANY, 'ProjectsPanoramas', 'project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'category' => 'Category',
			'description' => 'Description',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('category',$this->category,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>false,
		));
	}

	public function getMainPhoto(){
		$folder = 'uploads/projects/'.$this->id.'/main/';
		if( !is_dir($folder) ){
			return null;
		}

		$photos_array = scandir($folder);

		if( count($photos_array) > 2 ){
			return $photos_array[2];			
		}

		return null;
	}

	public function getPhotos(){
		$folder = 'uploads/projects/'.$this->id.'/';
		if( !is_dir($folder) ){
			return array();
		}

		$photos_array = scandir($folder);

		if( count($photos_array) > 2 ){
			array_splice($photos_array, 0, 2);			
		}

		if (($key = array_search('main', $photos_array)) !== false) {
		    unset($photos_array[$key]);
		}

		return array_values($photos_array);
	}
	public function getVideos(){
		$videos_array = array();
		foreach ($this->videos as $video) {
			$videos_array[] = array('id'=>$video->id, 'link'=>$video->link, 'order'=>$video->order);
		}

		return $videos_array;
	}
	public function getPanoramas(){
		$panoramas_array = array();
		foreach ($this->panoramas as $panorama) {
			$panoramas_array[] = array('id'=>$panorama->id, 'link'=>$panorama->link, 'order'=>$panorama->order);
		}

		return $panoramas_array;
	}

	public function hasPhotos(){
		$folder = 'uploads/projects/'.$this->id.'/';
		if( !is_dir($folder) ){
			return false;
		}

		$photos_array = scandir($folder);

		if( count($photos_array) > 2 ){
			return true;		
		}

		return false;
	}
	public function hasVideos(){
		return count($this->videos) > 0;
	}
	public function hasPanoramas(){
		return count($this->panoramas) > 0;
	}


	public function getNextId()
	{
	    $record=self::model()->find(array(
	            'condition' => 'id>:current_id',
	            'order' => 'id ASC',
	            'limit' => 1,
	            'params'=>array(':current_id'=>$this->id),
	    ));

	    if($record!==null){
	        return $record->id;
	    }else{
	    	//getting the first element as next element to the last element
	    	$record=self::model()->find(array(
	            'condition' => 'id<:current_id',
	            'order' => 'id ASC',
	            'limit' => 1,
	            'params'=>array(':current_id'=>$this->id),
	    	));

	    	if($record!==null){
		        return $record->id;
		    }
	    }

	    return null;
	}
	public function getPreviousId()
	{
	    $record=self::model()->find(array(
	            'condition' => 'id<:current_id',
	            'order' => 'id DESC',
	            'limit' => 1,
	            'params'=>array(':current_id'=>$this->id),
	    ));

	    if($record!==null){
	        return $record->id;
	    }else{
	    	//getting the last element as previous element to the first element
	    	$record=self::model()->find(array(
	            'condition' => 'id>:current_id',
	            'order' => 'id DESC',
	            'limit' => 1,
	            'params'=>array(':current_id'=>$this->id),
	    	));

	    	if($record!==null){
		        return $record->id;
		    }
	    }

	    return null;
	}
}