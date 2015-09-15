<div class="gallery-body">
	<div class="contianer">
		<div class="item">
			<a href="<?= Yii::app()->createUrl("site/projects", array("type"=>"photos")) ?>">
				<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/gallery/images.png" alt="small logo" />
			</a>
			<div class="arrow-and-details">
				<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/gallery/arrow.png" alt="arrow" />
				<h3>Photos</h3>
				<p>Navigate hundreds of NMG projects' photos</p>
			</div>
		</div>
		<div class="item">
			<a href="<?= Yii::app()->createUrl("site/projects", array("type"=>"videos")) ?>">
				<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/gallery/video.png" alt="small logo" />
			</a>
			<div class="arrow-and-details">
				<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/gallery/arrow.png" alt="arrow" />
				<h3>Videos</h3>
				<p>Watch NMG videos </p>
			</div>
		</div>
		<div class="item">
			<a href="<?= Yii::app()->createUrl("site/projects", array("type"=>"panoramas")) ?>">
				<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/gallery/panorama.png" alt="small logo" />
			</a>
			<div class="arrow-and-details">
				<img src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/imgs/gallery/arrow.png" alt="arrow" />
				<h3>Panoramas</h3>
				<p>Experience NMG projects in interactive 360 panoramas</p>
			</div>
		</div>
	</div>
</div>