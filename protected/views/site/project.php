<?php $type = $_GET['type']; ?>

<div class="project-body">
	<div class="project-contianer">
		<?php if( $type == "photos" ){ ?>
		<?php $items_count = count($photos); ?>
		<div class="project-items" style="width: <?= $items_count*2880 ?>px">
		<?php foreach ($photos as $key => $photo) { ?>
			<div class="item-contianer">
			<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/uploads/projects/<?= $_GET['id'] ?>/<?= $photo ?>" alt="project photo" />
			</div>
		<?php } ?>
		</div>
		<?php } else if( $type == "videos" ){ ?>
		<?php $items_count = count($videos); ?>
		<div class="project-items" style="width: <?= $items_count*2880 ?>px">
		<?php foreach ($videos as $key => $video) { ?>
			<div class="item-contianer">
				<iframe src="<?= $video['link'] ?>" frameborder="0"></iframe>
			</div>
		<?php } ?>
		</div>
		<?php } else if( $type == "panoramas" ){ ?>
		<?php $items_count = count($panoramas); ?>
		<div class="project-items" style="width: <?= $items_count*2880 ?>px">
		<?php foreach ($panoramas as $key => $panorama) { ?>
			<div class="item-contianer">
				<iframe src="<?= $panorama['link'] ?>" frameborder="0"></iframe>
			</div>
		<?php } ?>
		</div>
		<?php } ?>		
		<div class="top-layer">
			<div class="projects-navigation">
				<?php if( isset($previous_project_id) ){ ?>
				<a class="previous" title="previous project" href="<?= Yii::app()->createUrl("site/project",array("type"=>$type, "id"=>$previous_project_id)) ?>"></a>
				<?php } ?>
				<?php if( isset($next_project_id) ){ ?>
				<a class="next" title="next project" href="<?= Yii::app()->createUrl("site/project",array("type"=>$type, "id"=>$next_project_id)) ?>"></a>
				<?php } ?>
			</div>
			<?php if( $items_count > 1 ){ ?>
			<div class="slider-button left" title="previous"></div>
			<div class="slider-button right" title="next"></div>
			<?php } ?>

			<?php if( $type == "photos" ){ ?>
			<div class="thumbnails">
				<div class="arrow up"></div>
				<div class="images">
					<?php foreach ($photos as $key => $photo) { ?>
						<div class="image-contianer">
						<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/uploads/projects/<?= $_GET['id'] ?>/<?= $photo ?>" alt="project photo" />
						</div>
					<?php } ?>
				</div>
				<div class="arrow down"></div>
			</div>
			<?php } ?>
			<div class="project-details">
				<h3 class="project-title"><?= $project->name ?></h3>
				<p class="project-description"><?= $project->description ?></p>
			</div>
		</div>
	</div>
</div>