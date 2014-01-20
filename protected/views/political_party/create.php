<?php
/* @var $this Political_partyController */
/* @var $model political_party */

$this->breadcrumbs=array(
	'Political Parties'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List political_party', 'url'=>array('index')),
	array('label'=>'Manage political_party', 'url'=>array('admin')),
);
?>

<h1>Create political_party</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>