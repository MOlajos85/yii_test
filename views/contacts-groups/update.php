<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ContactsGroups $model */

$this->title = 'Update Contacts Groups: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Contacts Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contacts-groups-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
