
<style type="text/css">
#main-image img{
	max-width: 150px;
	max-height: 150px;
}
#images {
	margin: 10px 0;
	overflow: hidden;
}
#images .image-container{
	float: left;
}
#images .image-container img{
	max-width: 100px;
	max-height: 100px;
	margin-right: 10px;
}
#images .image-container .delete-button{
	margin-right: 10px;
	height: 20px;
	line-height: 20px;
	text-align: center;
	background-color: #ab1010;
	color: white;
    cursor: pointer;
}
.qq-uploader{
	clear: both;
}
.qq-upload-button{
    background: none repeat scroll 0 0 #23709e;
}
.qq-upload-list{
    display: none;
}

#videos{
	margin: 10px 0;
	overflow: hidden;
}
#videos .video-container{
	overflow: hidden;
}
#videos .video-container a{
	float: left;
	margin-right: 10px;
	width: 300px;
}
#videos .video-container .delete-button{
	float: left;
	width: 60px;
	height: 20px;
	line-height: 20px;
	text-align: center;
	background-color: #ab1010;
	color: white;
	margin-bottom: 2px;
    cursor: pointer;
}
.add-video{
    background: none repeat scroll 0 0 #23709e;
 	border-bottom: 1px solid #ddd;
    color: #fff;
    display: block;
    padding: 7px 0;
    text-align: center;
    width: 105px;
    margin-top: 10px;
    cursor: pointer;
}

#panoramas{
	margin: 10px 0;
	overflow: hidden;
}
#panoramas .panorama-container{
	overflow: hidden;
}
#panoramas .panorama-container a{
	float: left;
	margin-right: 10px;
	width: 300px;
}
#panoramas .panorama-container .delete-button{
	float: left;
	width: 60px;
	height: 20px;
	line-height: 20px;
	text-align: center;
	background-color: #ab1010;
	color: white;
	margin-bottom: 2px;
    cursor: pointer;
}
.add-panorama{
    background: none repeat scroll 0 0 #23709e;
 	border-bottom: 1px solid #ddd;
    color: #fff;
    display: block;
    padding: 7px 0;
    text-align: center;
    width: 105px;
    margin-top: 10px;
    cursor: pointer;
}
</style>

<script type="text/javascript">
$(window).load(function(){
	getMainPhoto();
	getPhotos();
	getVideos();
	getPanoramas();
});
function getMainPhoto() {
    $('#main-image').fadeOut(function(){
    	$('#main-image').html('');
	    $.ajax({
	        url: "index.php?r=projects/getMainPhoto", 
	        data: "id=<?= $model->id ?>",
	        type: "GET",
	        success: function(result){
	            console.log(result);
	            image = result;
	            if ( image != "null" ){
	            	img = "<img src='<?= Yii::app()->getBaseUrl(true) ?>/uploads/projects/<?= $model->id ?>/main/"+image+"'' />";
	            	$('#main-image').append(img);
	            };
	            $('#main-image').fadeIn();
	        },
	        error: function(result) {
	            console.log('error');
	            console.log(result);
	        }
	    });
    });
}
function getPhotos() {
    $('#images').fadeOut(function(){
    	$('#images').html('');
	    $.ajax({
	        url: "index.php?r=projects/getPhotos", 
	        data: "id=<?= $model->id ?>",
	        type: "GET",
	        success: function(result){
	            console.log(result);
	            images = JSON.parse(result);
	            for (var i = 0; i < images.length; i++) {
	            	html  = "<div class='image-container'>";
	            	html += "<img src='<?= Yii::app()->getBaseUrl(true) ?>/uploads/projects/<?= $model->id ?>/"+images[i]+"' />";
	            	html += "<div class='delete-button' onclick='deletePhoto(\""+images[i]+"\")'>delete</div>";
	            	html += "</div>";
	            	$('#images').append(html);
	            };
	            $('#images').fadeIn();
	        },
	        error: function(result) {
	            console.log('error');
	            console.log(result);
	        }
	    });
    });
}
function getVideos() {
    $('#videos').fadeOut(function(){
    	$('#videos').html('');
	    $.ajax({
	        url: "index.php?r=projects/getVideos", 
	        data: "id=<?= $model->id ?>",
	        type: "GET",
	        success: function(result){
	            console.log(result);
	            videos = JSON.parse(result);
	            for (var i = 0; i < videos.length; i++) {
	            	html  = "<div class='video-container'>";
	            	html += "<a href='"+videos[i]['link']+"' target='_blank'>"+videos[i]['link']+"<a/>";
	            	html += "<div class='delete-button' onclick='deleteVideo("+videos[i]['id']+")'>delete</div>";
	            	html += "</div>";
	            	$('#videos').append(html);
	            };
	            $('#videos').fadeIn();
	        },
	        error: function(result) {
	            console.log('error');
	            console.log(result);
	        }
	    });
    });
}
function getPanoramas() {
    $('#panoramas').fadeOut(function(){
    	$('#panoramas').html('');
	    $.ajax({
	        url: "index.php?r=projects/getPanoramas", 
	        data: "id=<?= $model->id ?>",
	        type: "GET",
	        success: function(result){
	            console.log(result);
	            panoramas = JSON.parse(result);
	            for (var i = 0; i < panoramas.length; i++) {
	            	html  = "<div class='panorama-container'>";
	            	html += "<a href='"+panoramas[i]['link']+"' target='_blank'>"+panoramas[i]['link']+"<a/>";
	            	html += "<div class='delete-button' onclick='deletePanorama("+panoramas[i]['id']+")'>delete</div>";
	            	html += "</div>";
	            	$('#panoramas').append(html);
	            };
	            $('#panoramas').fadeIn();
	        },
	        error: function(result) {
	            console.log('error');
	            console.log(result);
	        }
	    });
    });
}

function deletePhoto(name) {
    $.ajax({
        url: "index.php?r=projects/deletePhoto", 
        data: "id=<?= $model->id ?>&name="+name,
        type: "GET",
        success: function(result){
            console.log(result);
            getPhotos();
        },
        error: function(result) {
            console.log('error');
            console.log(result);
        }
    });
}

function addVideo() {
    var link = prompt("Please enter the link", "");
    if (link != null) {
        $.ajax({
	        url: "index.php?r=projects/addVideo", 
	        data: "project_id=<?= $model->id ?>&link="+link,
	        type: "GET",
	        success: function(result){
	            console.log(result);
	            getVideos();
	        },
	        error: function(result) {
	            console.log('error');
	            console.log(result);
	        }
	    });
    }
}
function deleteVideo(id) {
    $.ajax({
        url: "index.php?r=projects/deleteVideo", 
        data: "id="+id,
        type: "GET",
        success: function(result){
            console.log(result);
            getVideos();
        },
        error: function(result) {
            console.log('error');
            console.log(result);
        }
    });
}
function addPanorama() {
    var link = prompt("Please enter the link", "");
    if (link != null) {
        $.ajax({
	        url: "index.php?r=projects/addPanorama", 
	        data: "project_id=<?= $model->id ?>&link="+link,
	        type: "GET",
	        success: function(result){
	            console.log(result);
	            getPanoramas();
	        },
	        error: function(result) {
	            console.log('error');
	            console.log(result);
	        }
	    });
    }
}
function deletePanorama(id) {
    $.ajax({
        url: "index.php?r=projects/deletePanorama", 
        data: "id="+id,
        type: "GET",
        success: function(result){
            console.log(result);
            getPanoramas();
        },
        error: function(result) {
            console.log('error');
            console.log(result);
        }
    });
}
</script>

<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Projects', 'url'=>array('index')),
	array('label'=>'Create Projects', 'url'=>array('create')),
	array('label'=>'Update Projects', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Projects', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Projects', 'url'=>array('admin')),
);
?>

<h1>View Projects #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description', 
		'category',
	),
)); ?>

<br />
<p>Main photo:-<br />(recommended size: 480px(width) X 1134px (height)</p>
<div id="main-image"></div>
<?php $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
	'id'=>'uploadMainImage',
	'config'=>array(
		'action'=>Yii::app()->createUrl('projects/uploadMainPhoto', array('id' =>$model->id)),
		'allowedExtensions'=>array("jpg","jpeg","gif","png","tif"),//array("jpg","jpeg","gif","exe","mov" and etc...
		'sizeLimit'=>10*1024*1024,// maximum file size in bytes
		'onComplete'=>"js:function(id, fileName, responseJSON){ 
			console.log(responseJSON); 
			getMainPhoto();
		}",
		'messages'=>array(
			'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
			'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
			'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
			'emptyError'=>"{file} is empty, please select files again without it.",
			'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
		),
		'showMessage'=>"js:function(message){ alert(message); }"
	)
)); ?>

<br />
<p>Project images:-<br />recommended size: 2880px(width) X 960px (height)</p>
<div id="images"></div>
<?php $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
	'id'=>'uploadImage',
	'config'=>array(
		'action'=>Yii::app()->createUrl('projects/uploadPhoto', array('id' =>$model->id)),
		'allowedExtensions'=>array("jpg","jpeg","gif","png","tif"),//array("jpg","jpeg","gif","exe","mov" and etc...
		'sizeLimit'=>10*1024*1024,// maximum file size in bytes
		'onComplete'=>"js:function(id, fileName, responseJSON){ 
			console.log(responseJSON); 
			getPhotos();
		}",
		'messages'=>array(
			'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
			'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
			'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
			'emptyError'=>"{file} is empty, please select files again without it.",
			'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
		),
		'showMessage'=>"js:function(message){ alert(message); }"
	)
)); ?>

<br />
<p>Project Videos:-<br />recommended size: 2880px(width) X 960px (height)</p>
<div id="videos"></div>
<div class='add-video' onclick="addVideo()">Add video</div>

<br />
<p>Project Panoramas:-<br />recommended size: 2880px(width) X 960px (height)</p>
<div id="panoramas"></div>
<div class='add-panorama' onclick="addPanorama()">Add panorama</div>
