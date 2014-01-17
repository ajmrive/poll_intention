<?php
/* @var $this Political_partyController */
/* @var $model Political_party */

$this->breadcrumbs=array(
	'Political Parties'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Political_party', 'url'=>array('index')),
	array('label'=>'Create Political_party', 'url'=>array('create')),
	array('label'=>'Update Political_party', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Political_party', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Political_party', 'url'=>array('admin')),
);
?>

<h1>View Political_party #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'Name',
		'Members',
		'Slogan',
	),
)); ?>
