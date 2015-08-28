<?php

namespace app\commands;

use app\models\User;
use yii\console\Controller;

/**
 * User commands.
 *
 * Create, read, update and delete user records.
 *
 * @author Memory Clutter <memclutter@gmail.com>
 */
class UserController extends Controller
{
    /**
     *
     * @param $email
     */
    public function actionCreateInvite($email)
    {
        $user = new User();
        $user->email = $email;
        $user->generateRandomPassword();
        $user->generateAuthKey();
        $user->generatePasswordResetToken();
        if (!$user->save()) {
            $this->outputValidateErrors($user->getErrors());
        } else {
            // todo: send email invite for user
            echo "\033[32mCreate invite for new user ID {$user->id}, email sent to {$user->email}\033[0m\n";
        }
    }

    /**
     * Create user command.
     *
     * @param $email email address
     * @param $password plain password
     */
    public function actionCreate($email, $password)
    {
        $user = new User();
        $user->email = $email;
        $user->password = $password;
        $user->generateAuthKey();
        if (!$user->save()) {
            $this->outputValidateErrors($user->getErrors());
        } else {
            echo "\033[32mCreate new user with ID {$user->id}\033[0m\n";
        }
    }

    private function outputValidateErrors($errors)
    {
        echo "\033[31mValidate errors\033[0m\n";
        foreach ($errors as $messages) {
            foreach ($messages as $message) {
                echo "\t{$message}\n";
            }
        }
    }
}