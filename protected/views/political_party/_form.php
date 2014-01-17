<?php
/* @var $this Political_partyController */
/* @var $model Political_party */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'political-party-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Members'); ?>
		<?php echo $form->textField($model,'Members'); ?>
		<?php echo $form->error($model,'Members'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Slogan'); ?>
		<?php echo $form->textField($model,'Slogan',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Slogan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->