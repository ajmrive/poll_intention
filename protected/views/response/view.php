<?php
/* @var $this ResponseController */
/* @var $model Response */

$this->breadcrumbs=array(
	'Responses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Response', 'url'=>array('index')),
	array('label'=>'Create Response', 'url'=>array('create')),
	array('label'=>'Update Response', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Response', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Response', 'url'=>array('admin')),
);
?>

<h1>View Response #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'Intention',
		'district_id',
		'political_party_id',
	),
)); ?>
