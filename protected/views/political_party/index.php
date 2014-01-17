<?php
/* @var $this Political_partyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Political Parties',
);

$this->menu=array(
	array('label'=>'Create Political_party', 'url'=>array('create')),
	array('label'=>'Manage Political_party', 'url'=>array('admin')),
);
?>

<h1>Political Parties</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
