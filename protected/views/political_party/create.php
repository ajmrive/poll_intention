<?php
/* @var $this Political_partyController */
/* @var $model Political_party */

$this->breadcrumbs=array(
	'Political Parties'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Political_party', 'url'=>array('index')),
	array('label'=>'Manage Political_party', 'url'=>array('admin')),
);
?>

<h1>Create Political_party</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>