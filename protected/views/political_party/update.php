<?php
/* @var $this Political_partyController */
/* @var $model Political_party */

$this->breadcrumbs=array(
	'Political Parties'=>array('index'),
	$model->Name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Political_party', 'url'=>array('index')),
	array('label'=>'Create Political_party', 'url'=>array('create')),
	array('label'=>'View Political_party', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Political_party', 'url'=>array('admin')),
);
?>

<h1>Update Political_party <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>