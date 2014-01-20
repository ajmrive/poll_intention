<?php
/* @var $this DistrictController */
/* @var $model district */

$this->breadcrumbs=array(
	'Districts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List district', 'url'=>array('index')),
	array('label'=>'Manage district', 'url'=>array('admin')),
);
?>

<h1>Create district</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>