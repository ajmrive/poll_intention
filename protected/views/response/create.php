<?php
/* @var $this ResponseController */
/* @var $model response */

$this->breadcrumbs=array(
	'Responses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List response', 'url'=>array('index')),
	array('label'=>'Manage response', 'url'=>array('admin')),
);
?>

<h1>Create response</h1>

<?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'districts'=>$districts,
    'political_party'=>$political_party   ));
?>