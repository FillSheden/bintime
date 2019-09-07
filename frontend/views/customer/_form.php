<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */
/* @var $address common\models\Addresses */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

    <div class="customer-form" style="display: flex">
        <div class="container" style="max-width: 35%">
            <div class="content">
                <h3 class="panel-title">Customer info</h3>
                <hr>
                <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'style' => 'text-transform:capitalize']) ?>
                <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'style' => 'text-transform:capitalize']) ?>
                <?= $form->field($model, 'sex')
                    ->dropDownList([ 'male' => 'Male', 'female' => 'Female', 'none' => 'None', ], ['prompt' => '', 'value' => 'male'])?>
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

    <?php if ($this->context->action->id != 'update') { ?>
        <hr>
        <div class="container" style="max-width: 35%">
            <div class="content">
                <h3 class="panel-title">Customer address</h3>
                <hr>
                <?= $form->field($address, 'post_index')->textInput(['type' => 'number']) ?>
                <?= $form->field($address, 'country')
                    ->textInput(['maxlength' => 2, 'value' => 'uk'])
                    ->label('Country [Max length = 2, for example Ukraine => uk]')?>
                <?= $form->field($address, 'city')->textInput(['maxlength' => true, 'value' => 'Kiev']) ?>
                <?= $form->field($address, 'street')->textInput(['maxlength' => true]) ?>
                <?= $form->field($address, 'house')->textInput(['type' => 'number']) ?>
                <?= $form->field($address, 'flat')->textInput(['type' => 'number']) ?>
            </div>
        </div>
    <?php } ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>
