<?php
/* @var $this Political_partyController */
/* @var $data Political_party */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Members')); ?>:</b>
	<?php echo CHtml::encode($data->Members); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Slogan')); ?>:</b>
	<?php echo CHtml::encode($data->Slogan); ?>
	<br />


</div>