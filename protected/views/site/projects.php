<div class="projects-body">
	<div class="projects-contianer" style="width: <?= ceil(count($projects)/6)*2880 ?>px">
		<?php foreach ($projects as $key => $project) { ?>
			<a class="project-contianer <?= ($project['hasPhotos'])?'has_photos':'' ?> <?= ($project['hasVideos'])?'has_videos':'' ?> <?= ($project['hasPanoramas'])?'has_panoramas':'' ?>" 
			   href="<?= Yii::app()->createUrl("site/project", array("type"=>$_GET['type'], "id"=>$project['id'])) ?>" 
			   <?php if( $project['image'] != 'null'){ ?> 
			   style="background-image: url('<?= Yii::app()->getBaseUrl(true) ?>/uploads/projects/<?= $project['id'] ?>/main/<?= $project['image'] ?>');" <?php } ?> >

				<div class="project-hex">
					<p><?= $project['name'] ?></p>
					<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/gallery/projects/<?= $project['category'] ?>.png" alt="<?= $project['category'] ?>" />
				</div>
				<div class="dark-layer"></div>
			</a>
		<?php } ?>
	</div>
	<div class="filter-buttons">
		<div class="arrow down"></div>
		<div class="filters">
			<a id="all-button" class="filter-button" href="<?= Yii::app()->createUrl("site/projects", array("type"=>$_GET['type'])) ?>"></a>
			<a id="healthcare-button" class="filter-button" href="<?= Yii::app()->createUrl("site/projects", array("type"=>$_GET['type'], "category"=>"healthcare")) ?>"></a>
			<a id="research-button" class="filter-button" href="<?= Yii::app()->createUrl("site/projects", array("type"=>$_GET['type'], "category"=>"research")) ?>"></a>
			<a id="hospitality-button" class="filter-button" href="<?= Yii::app()->createUrl("site/projects", array("type"=>$_GET['type'], "category"=>"hospitality")) ?>"></a>
			<a id="corporate-button" class="filter-button" href="<?= Yii::app()->createUrl("site/projects", array("type"=>$_GET['type'], "category"=>"corporate")) ?>"></a>
		</div>
		<div class="arrow up"></div>
	</div>
	<div class="sliders-buttons">
		<?php for ($i=1; $i <= ceil(count($projects)/6); $i++) { ?>
			<div class="slider-button<?= ($i==1)?' active':'' ?>"></div>
		<?php } ?>
	</div>
	<div class="type-buttons">
		<a href="<?= Yii::app()->createUrl("site/projects", array("type"=>"photos")) ?>"><div id="photos-button" class="type-button"></div></a>
		<a href="<?= Yii::app()->createUrl("site/projects", array("type"=>"videos")) ?>"><div id="videos-button" class="type-button"></div></a>
		<a href="<?= Yii::app()->createUrl("site/projects", array("type"=>"panoramas")) ?>"><div id="panoramas-button" class="type-button"></div></a>
	</div>
</div>