<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Addresses */
/* @var $form yii\widgets\ActiveForm */
/* @var $id_customer common\models\Customer -> id */
?>

<div class="addresses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if (isset($id_customer) and $id_customer > 0) { ?>
        <?= $form->field($model, 'id_customer')->hiddenInput(['value' => $id_customer])->label(false) ?>
    <?php }  else { ?>
        <?= $form->field($model, 'id_customer')->textInput() ?>
    <?php } ?>

    <?= $form->field($model, 'post_index')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house')->textInput() ?>

    <?= $form->field($model, 'flat')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
