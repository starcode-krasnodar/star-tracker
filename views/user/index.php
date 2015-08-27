<?php

use app\models\User;
use cebe\gravatar\Gravatar;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            [
                'label' => 'Gravatar',
                'attribute' => 'email',
                'value' => function(User $user) {
                    return Gravatar::widget(['email' => $user->email, 'size' => 32]);
                },
                'format' => 'raw',
            ],
            'email:email',
            // 'status',
            'created_at:datetime',
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
