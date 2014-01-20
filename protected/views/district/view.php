<?php
/* @var $this DistrictController */
/* @var $model district */

$this->breadcrumbs=array(
	'Districts'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List district', 'url'=>array('index')),
	array('label'=>'Create district', 'url'=>array('create')),
	array('label'=>'Update district', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete district', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage district', 'url'=>array('admin')),
);
?>

<h1>View <?php echo $model->Name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'Name',
		'Population',
		'Status',
	),
)); ?>
