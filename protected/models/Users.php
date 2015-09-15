<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id
 * @property string $username
 * @property string $password
 */
class Users extends CActiveRecord {

    // holds the password confirmation word
    public $password_confirmation;
    //will hold the encrypted password for update actions.
    public $initialPassword;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username', 'required'),
            //password confirmation
            // array('password, password_confirmation', 'required', 'on' => 'insert'),
            array('password, password_confirmation', 'length', 'min' => 6, 'max' => 60),
            array('password_confirmation', 'compare', 'compareAttribute' => 'password'),
            array('username', 'unique'),
            // array('birthdate', 'date', 'format' => 'yyyy-MM-dd', 'allowEmpty'=>true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'password_confirmation' => 'Password confirmation',
        );
    }

    public function beforeSave() {
        // in this case, we will use the old hashed password.
        if (empty($this->password) && empty($this->password_confirmation) && !empty($this->initialPassword)) {
            $this->password = $this->initialPassword;
        } else {
            $this->password = sha1($this->password); //TODO: edit password encryption method
        }

        return parent::beforeSave();
    }

    public function afterFind() {
        //reset the password to null because we don't want the hash to be shown.
        $this->initialPassword = $this->password;
        $this->password = null;

        parent::afterFind();
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {

        $sort = new CSort;
        $sort->attributes = array(
            'id' => array(
                'asc' => 'id',
                'desc' => 'id desc',
            ),
            'username' => array(
                'asc' => 'username',
                'desc' => 'username desc',
            ),
        );

        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id, true);
        $criteria->compare('username', $this->username, true);

        return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
                'sort' => $sort,
        ));
    }

}