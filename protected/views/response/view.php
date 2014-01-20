<?php
/* @var $this ResponseController */
/* @var $model response */

$this->breadcrumbs=array(
	'Responses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List response', 'url'=>array('index')),
	array('label'=>'Create response', 'url'=>array('create')),
	array('label'=>'Update response', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete response', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage response', 'url'=>array('admin')),
);
?>

<h1>View response #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'Intention',
		'political_party_id',
		'district_id',
	),
)); ?>
