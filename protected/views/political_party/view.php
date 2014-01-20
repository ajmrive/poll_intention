<?php
/* @var $this Political_partyController */
/* @var $model political_party */

$this->breadcrumbs=array(
	'Political Parties'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List political_party', 'url'=>array('index')),
	array('label'=>'Create political_party', 'url'=>array('create')),
	array('label'=>'Update political_party', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete political_party', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage political_party', 'url'=>array('admin')),
);
?>

<h1>View <?php echo $model->Name; ?></h1>
<h2>"<?php echo $model->Slogan; ?>"</h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'Name',
		'Members',
		'Slogan',
		'Status',
	),
)); ?>
