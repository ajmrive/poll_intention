<?php
/* @var $this ResponseController */
/* @var $model response */

$this->breadcrumbs=array(
	'Responses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List response', 'url'=>array('index')),
	array('label'=>'Create response', 'url'=>array('create')),
	array('label'=>'View response', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage response', 'url'=>array('admin')),
);
?>

<h1>Update response <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>