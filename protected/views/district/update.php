<?php
/* @var $this DistrictController */
/* @var $model district */

$this->breadcrumbs=array(
	'Districts'=>array('index'),
	$model->Name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List district', 'url'=>array('index')),
	array('label'=>'Create district', 'url'=>array('create')),
	array('label'=>'View district', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage district', 'url'=>array('admin')),
);
?>

<h1>Update district <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>