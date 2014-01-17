<?php
/* @var $this ResponseController */
/* @var $data Response */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Intention')); ?>:</b>
	<?php echo CHtml::encode($data->Intention); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('district_id')); ?>:</b>
	<?php echo CHtml::encode($data->district_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('political_party_id')); ?>:</b>
	<?php echo CHtml::encode($data->political_party_id); ?>
	<br />


</div>