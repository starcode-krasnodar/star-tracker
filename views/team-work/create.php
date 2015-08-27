<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TeamWork */

$this->title = Yii::t('app', 'Create Team Work');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Team Works'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-work-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
