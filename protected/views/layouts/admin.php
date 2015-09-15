<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/admin/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/admin/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/admin/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/admin/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/admin/form.css" />

    <script type="text/javascript" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/js/jquery-1.8.3.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/js/jquery-ui-1.9.2.custom.min.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Banner', 'url'=>array('/banner/view')),
				array('label'=>'Data', 'url'=>array('/data/index')),
				array('label'=>'Projects', 'url'=>array('/projects/index')),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'))
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
                
	<div class="span-19">
                <div id="content">
                        <?php echo $content; ?>
                </div><!-- content -->
        </div>
        <div class="span-5 last">
                <div id="sidebar">
                <?php
                        $this->beginWidget('zii.widgets.CPortlet', array(
                                'title'=>'Operations',
                        ));
                        $this->widget('zii.widgets.CMenu', array(
                                'items'=>$this->menu,
                                'htmlOptions'=>array('class'=>'operations'),
                        ));
                        $this->endWidget();
                ?>
                </div><!-- sidebar -->
        </div>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by beYourSelfie.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>