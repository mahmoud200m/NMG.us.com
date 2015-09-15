<?php

class BannerController extends AdminController
{

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view');
	}

	public function actionUploadMainPhoto(){
        $folder = 'uploads/banner/image/';
		if (file_exists($folder)) {
			$this->deleteFolder($folder);
		    mkdir($folder, 0777);
		}else{
		    mkdir($folder, 0777);
		}
        $this->upload($folder);
    }

    public function actionGetMainPhoto(){
    	$folder = 'uploads/banner/image/';
    	if( file_exists($folder) && 
    		(($photos_array = scandir($folder)) > 2) ){
			echo $folder.$photos_array[2];
		}else{
			echo 'imgs/home/slider.png';
		}
	}

}
