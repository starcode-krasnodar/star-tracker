<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Login');
?>
<?php $form = ActiveForm::begin() ?>
    <fieldset>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-lg btn-success btn-block']) ?>
        </div>
    </fieldset>
<?php $form->end() ?>
<?= Html::a('Forgot password?', ['/profile/request-password-reset']) ?>