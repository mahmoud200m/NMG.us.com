<?php

class ProjectsController extends AdminController
{

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Projects;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Projects']))
		{
			$model->attributes=$_POST['Projects'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Projects']))
		{
			$model->attributes=$_POST['Projects'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Projects');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Projects('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Projects']))
			$model->attributes=$_GET['Projects'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Projects::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='projects-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionUploadMainPhoto($id){
        $folder = 'uploads/projects/'.$id.'/main/';
        if (!file_exists('uploads/projects/'.$id.'/')) {
		    mkdir($folder, 0777);
		}
		if (file_exists($folder)) {
			$this->deleteFolder($folder);
		    mkdir($folder, 0777);
		}
        $this->upload($folder);
    }

    public function actionUploadPhoto($id){
        $folder = 'uploads/projects/'.$id.'/';
        $this->upload($folder);
    }

    public function actionGetMainPhoto($id){
        $photo = Projects::model()->findByPk($id)->getMainPhoto();
		echo $photo;
	}

    public function actionGetPhotos($id){
        $photos_array = Projects::model()->findByPk($id)->getPhotos();
		echo json_encode($photos_array);
	}
	public function actionGetVideos($id){
        $videos_array = Projects::model()->findByPk($id)->getVideos();
		echo json_encode($videos_array);
	}
	public function actionGetPanoramas($id){
        $panoramas_array = Projects::model()->findByPk($id)->getPanoramas();
		echo json_encode($panoramas_array);
	}

	public function actionDeletePhoto($id, $name){
		$file = 'uploads/projects/'.$id.'/'.$name;
		if( unlink($file) )
			echo 'done';
		else
		  	echo "error deleting $file";
    }

    public function actionAddVideo($project_id, $link){
        $model = new ProjectsVideos;
		$model->project_id = $project_id;
		$model->link = $link;
		$model->order = 0;
		if($model->save())
			echo 'done';
		else
			print_r($model->getErrors());
    }
    public function actionDeleteVideo($id){
        $model = ProjectsVideos::model()->findByPk($id);
		if($model->delete())
			echo 'done';
		else
			print_r($model->getErrors());
    }

    public function actionAddPanorama($project_id, $link){
        $model = new ProjectsPanoramas;
		$model->project_id = $project_id;
		$model->link = $link;
		$model->order = 0;
		if($model->save())
			echo 'done';
		else
			print_r($model->getErrors());
    }
    public function actionDeletePanorama($id){
        $model = ProjectsPanoramas::model()->findByPk($id);
		if($model->delete())
			echo 'done';
		else
			print_r($model->getErrors());
    }
    
}
