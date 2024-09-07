<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ContactsGroups $model */

$this->title = 'Create Contacts Groups';
$this->params['breadcrumbs'][] = ['label' => 'Contacts Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-groups-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
