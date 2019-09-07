<?php

/* @var $this yii\web\View */

$this->title = 'Customers list';

use yii\helpers\Url; ?>
<div class="site-index">

    <div class="jumbotron">
        <h2><?= $this->title ?></h2>
        <a class="btn btn-success" href="<?=Url::to(['customer/create'])?>">Create new customer</a>
    </div>

    <div class="body-content">

    </div>
</div>
