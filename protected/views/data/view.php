<?php
/* @var $this DataController */
/* @var $model Data */

$this->breadcrumbs=array(
	'Datas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Data', 'url'=>array('index')),
	array('label'=>'Update Data', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Manage Data', 'url'=>array('admin')),
);
?>

<h1>View Data #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'text',
	),
)); ?>
