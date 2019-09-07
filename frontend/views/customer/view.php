<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'View ' . $model->login;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

    <h1><?= Html::encode($this->title) ?></h1>

        <div class="container" style="display: flex">
            <div class="content" style="max-width: 20%">
                <h3>Customer Info:</h3>
                <hr>
                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'login',
                        'password',
                        'first_name',
                        'last_name',
                        'sex',
                        'created',
                        'email:email',
                    ],
                ]) ?>
            </div>

            <div class="content" style="max-width: 30%; margin-left: 10%">
                <h3>Customer addresses:</h3>
                <hr>
                <p>
                    <?= Html::a('Create new address', ['addresses/create', 'id_customer' => $model->id], ['class' => 'btn btn-success']) ?>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'id',
                        'id_customer',
                        'post_index',
                        'country',
                        'city',
                        'street',
                        'house',
                        'flat',
                        [
                            'label' => 'Balance',
                            'value' => function ($model) {
                                return "<a class='btn btn-warning' href='".Url::to(['addresses/update', 'id' => $model->id])."'>Edit</a>";
                            },
                            'format' => 'html'
                        ],
                    ],
                ]); ?>

            </div>
        </div>