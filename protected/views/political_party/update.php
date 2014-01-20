<?php
/* @var $this Political_partyController */
/* @var $model political_party */

$this->breadcrumbs=array(
	'Political Parties'=>array('index'),
	$model->Name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List political_party', 'url'=>array('index')),
	array('label'=>'Create political_party', 'url'=>array('create')),
	array('label'=>'View political_party', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage political_party', 'url'=>array('admin')),
);
?>

<h1>Update political_party <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>