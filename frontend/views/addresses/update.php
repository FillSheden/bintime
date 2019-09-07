<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Addresses */

$this->title = Yii::t('app', 'Update Addresses: {name}', [
    'name' => $model->country . ' / ' . $model->city . ' / ' . $model->street,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Addresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->country . ' / ' . $model->city . ' / ' . $model->street, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="addresses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
