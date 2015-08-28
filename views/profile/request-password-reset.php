<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= Yii::t('app', 'Request password reset') ?></h3>
                </div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']) ?>
                    <fieldset>
                        <?= $form->field($model, 'email')->textInput() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Send', ['class' => 'btn btn-lg btn-success btn-block']) ?>
                        </div>
                    </fieldset>
                    <?php $form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>