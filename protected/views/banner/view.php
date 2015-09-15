
<style type="text/css">
#main-image img{
	max-width: 150px;
	max-height: 150px;
}
#images {
	margin: 10px 0;
	overflow: hidden;
}
#images img{
	float: left;
	max-width: 100px;
	max-height: 100px;
	margin-right: 10px;
}
.qq-uploader {
	clear: both;
}
.qq-upload-button {
    background: none repeat scroll 0 0 #23709e;
}
.qq-upload-list {
    display: none;
}
</style>

<script type="text/javascript">
$(window).load(function(){
	getMainPhoto();
});
function getMainPhoto() {
    $('#main-image').fadeOut(function(){
    	$('#main-image').html('');
	    $.ajax({
	        url: "index.php?r=banner/getMainPhoto", 
	        type: "GET",
	        success: function(result){
	            console.log(result);
	            image = result;
	            if ( image != "null" ){
	            	img = "<img src='<?= Yii::app()->getBaseUrl(true) ?>/"+image+"' />";
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
</script>

<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Banner'=>array('view'),
);

$this->menu=array(
);
?>

<h1>View Banner</h1>

<p>Main photo:-<br />(recommended size: 2880px(width) X 1135px (height)</p>
<div id="main-image"></div>
<?php $this->widget('ext.EAjaxUpload.EAjaxUpload', array(
	'id'=>'uploadMainImage',
	'config'=>array(
		'action'=>Yii::app()->createUrl('banner/uploadMainPhoto'),
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