<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <hr style="color: gray">


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a(' Add new ', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <hr style="color: gray">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'number',
            'invoice',
            'supply',
            'comment:ntext',
            [
                'class' => 'yii\grid\ActionColumn',

                'visibleButtons' =>
                    [
                        'update' => Yii::$app->user->can('updatePost'),

                        'view' => Yii::$app->user->can('updatePost'),

                        'delete' => Yii::$app->user->can('deletePost')
                    ]
// 'view' => Yii::$app->user->isGuest(),
                 ]
            ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
