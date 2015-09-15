<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class SiteController extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/website',
	 * meaning using a single column layout. See 'protected/views/layouts/website.php'.
	 */
	public $layout='//layouts/site';

	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();

	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
    /**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCzaHA image displayed on the contacts page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/site.php'
        $this->redirect(array('site/home'));                                    
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout='empty';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{	
		$this->layout='empty';
		
        $default_login_redirect = array('projects/index');
		$model=new LoginForm;
                
        if(!Yii::app()->user->isGuest){
                $this->redirect($default_login_redirect);
        }
                
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
                $this->redirect($default_login_redirect);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout(){
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/********************************************/
	/********************************************/
	/********************************************/
 	public function actionHome(){
 		$folder = 'uploads/banner/image/';
    	if( file_exists($folder) && 
    		(($photos_array = scandir($folder)) > 2) ){
			$slider_image = $folder.$photos_array[2];
		}else{
			$slider_image = 'imgs/home/slider.png';
		}

 		$models = Data::model()->findAll();
 		$data = CHtml::listData($models,'name', 'text');

 		Yii::app()->session['nav'] = 'home';
		$this->render('home', array('slider_image'=>$slider_image, 'data'=>$data));
	}       
	public function actionEnvironments(){
 		Yii::app()->session['nav'] = 'industries';
		$this->render('industries');
	}
	public function actionProducts(){
 		Yii::app()->session['nav'] = 'products';
		$this->render('products');
	}
	public function actionServices(){
 		Yii::app()->session['nav'] = 'services';
		$this->render('services');
	}
	public function actionPartners(){
 		Yii::app()->session['nav'] = 'partners';
		$this->render('partners');
	}
	public function actionPartner(){
 		Yii::app()->session['nav'] = 'partners';
		$this->render('partner');
	}
	public function actionManufacturers(){
 		Yii::app()->session['nav'] = 'manufacturers';
		$this->render('manufacturers');
	}
	public function actionAlliances(){
 		Yii::app()->session['nav'] = 'alliances';
		$this->render('alliances');
	}
	public function actionGallery(){
 		Yii::app()->session['nav'] = 'gallery';
		$this->render('gallery');
	}
	public function actionProjects($type, $category=null){
 		Yii::app()->session['nav'] = 'gallery';

 		if( $category === null ){
			$projects = Projects::model()->findAll();
 		}else{
 			$projects = Projects::model()->findAll('category="'.$category.'"');
 		}
		$projects_array = array();
		foreach ($projects as $key => $project) {
			if( ($type == 'photos' && $project->hasPhotos()) || 
				($type == 'videos' && $project->hasVideos()) || 
				($type == 'panoramas' && $project->hasPanoramas()) ){
				$projects_array[] = array('id'=>$project->id, 'name'=>$project->name, 'category'=>$project->category, 'image'=>$project->getMainPhoto(),  
										  'hasPhotos'=>$project->hasPhotos(), 'hasVideos'=>$project->hasVideos(), 'hasPanoramas'=>$project->hasPanoramas());
			}
		}
		$this->render('projects', array('projects'=>$projects_array));
	}
	public function actionProject($type, $id){
 		Yii::app()->session['nav'] = 'gallery';

 		$id = $_GET['id'];
 		$project = Projects::model()->findByPK($_GET['id']);
 		$previous_project_id = $project->getPreviousId();
 		$next_project_id = $project->getNextId();

		if( isset($project) ){
			$photos = $project->getPhotos();
			$videos = $project->getVideos();
			$panoramas = $project->getPanoramas();
			$this->render('project', array('project'=>$project, 'previous_project_id'=>$previous_project_id, 'next_project_id'=>$next_project_id,
										   'photos'=>$photos, 'videos'=>$videos, 'panoramas'=>$panoramas));
		}else{
        	$this->redirect(array('site/error'));                                    
		}
	}
	public function actionContacts(){
 		Yii::app()->session['nav'] = 'contacts';
		$this->render('contacts');
	}
	public function actionSendEmail(){
		$mail = new YiiMailer();
		$mail->setFrom($_POST['email'], $_POST['name']);
		$mail->setTo('info@nmg.us.com');
		$mail->setSubject($_POST['subject']);
		$mail->setBody($_POST['message']);
		if ($mail->send()) {
		    echo "done";
		} else {
			echo "error";
		}
	}
}