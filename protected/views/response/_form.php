<?php
/* @var $this ResponseController */
/* @var $model response */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php /* $form=$this->beginWidget('CActiveForm', array(
      'id'=>'response-form',
      'enableAjaxValidation'=>false,
      )); */ ?>

    <?php
    /** @var BootActiveForm $form */
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'horizontalForm',
        'type' => 'horizontal',
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php
        $districts_array = array();
        foreach ($districts as $id => $data) {
            $districts_array[$data->id] = $data->Name;
        };
        echo $form->dropDownListRow($model, 'district_id', $districts_array);

        echo $form->error($model, 'district_id');
        ?>
    </div>

    <div class="row">
        <?php
        //echo $form->textField($model, 'Intention', array('size' => 10, 'maxlength' => 10)); 
        echo $form->radioButtonListRow($model, 'Intention', array(0 => 'No', 1 => 'Yes'), array(
            'onChange' => '
                        if ($(this).val() == 1){
                            $(".political_parties_option").removeAttr("disabled");
                            $(".political_parties_option").attr("required", "required");
                        }
                        else
                            $(".political_parties_option").attr("disabled", "disabled");',
        ));
        echo $form->error($model, 'Intention');
        ?>
    </div>

    <div class="row">
        <?php
        $political_parties = array();
        foreach ($political_party as $id => $data) {
            $political_parties[$data->id] = $data->Name . ' - ' . $data->Slogan;
        };
        echo $form->radioButtonListRow($model, 'political_party_id', $political_parties, array(
            'class' => 'political_parties_option',
            'disabled' => 'disabled',
        ));
        echo $form->error($model, 'political_party_id');
        ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->