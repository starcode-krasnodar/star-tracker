<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Login');
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">StarTracker <?= Yii::t('app', 'Login') ?></h3>
                </div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin() ?>
                        <fieldset>
                            <?= $form->field($model, 'email')->textInput() ?>
                            <?= $form->field($model, 'password')->passwordInput() ?>
                            <div class="form-group">
                                <?= Html::submitButton('Login', ['class' => 'btn btn-lg btn-success btn-block']) ?>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>