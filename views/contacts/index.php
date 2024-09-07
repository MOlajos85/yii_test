<?php

use app\models\Contacts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ContactsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Contacts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'First Name',
                'attribute' => 'firstname',
            ],
            [
                'label' => 'Last Name',
                'attribute' => 'lastname',
            ],
            'id',
            'firstname',
            'lastname',
            'company',
            'address:ntext',
            //'phone',
            //'mobile',
            //'fax',
            //'pemail:email',
            //'semail:email',
            //'country',
            //'websiteurl',
            //'gender',
            //'birthday',
            //'status',
            [
                'label' => 'Groups',
                'format' => 'ntext',
                'attribute'=>'groupname',
                'value' => function($model) {
                    foreach ($model->groups as $group) {
                        $groupNames[] = $group->groupname;
                    }
                    return implode("\n", $groupNames);
                },
            ],
            [
                'label' => 'Primary Email',
                'attribute' => 'pemail',
            ],
            //'sentstatus',
            //'addeddate',
            //'updateddate',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Contacts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
