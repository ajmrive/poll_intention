<?php
/* @var $this Political_partyController */
/* @var $model political_party */

$this->breadcrumbs=array(
	'Political Parties'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List political_party', 'url'=>array('index')),
	array('label'=>'Create political_party', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('political-party-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Political Parties</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'political-party-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'Name',
		'Members',
		'Slogan',
		'Status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
