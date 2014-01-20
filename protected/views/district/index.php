<?php
/* @var $this DistrictController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Districts',
);

$this->menu=array(
	array('label'=>'Create district', 'url'=>array('create')),
	array('label'=>'Manage district', 'url'=>array('admin')),
);
?>

<h1>Districts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
