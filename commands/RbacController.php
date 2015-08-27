<?php

namespace app\commands;

use app\models\User;
use Yii;
use yii\base\InvalidParamException;
use yii\console\Controller;
use yii\console\Exception;

/**
 * RBAC commands.
 *
 * Manage role based access control.
 */
class RbacController extends Controller
{
    /**
     * Assign command.
     *
     * Assign new role to user.
     *
     * @param $userEmail
     * @param $roleName
     */
    public function actionAssign($userEmail, $roleName)
    {
        $user = $this->findUser($userEmail);
        $role = $this->findRole($roleName);
        if (!in_array($roleName, $user->getRoles(true))) {
            $this->getAuthManager()->assign($role, $user->id);
            echo "\033[32mSuccess assign role {$roleName} to user {$userEmail}\033[0m\n";
        } else {
            echo "\033[33mRole {$roleName} already assigned with user {$userEmail}\033[0m\n";
        }
    }

    /**
     * Revoke command.
     *
     * Revoke role from user.
     *
     * @param $userEmail
     * @param $roleName
     *
     * @throws \yii\console\Exception
     */
    public function actionRevoke($userEmail, $roleName)
    {
        $user = $this->findUser($userEmail);
        $role = $this->findRole($roleName);
        if (in_array($roleName, $user->getRoles(true))) {
            $this->getAuthManager()->revoke($role, $user->id);
            echo "\033[32mSuccess revoke role {$roleName} from user {$userEmail}\033[0m\n";
        } else {
            echo "\033[33mRole {$roleName} already revoke from user {$userEmail}\033[0m\n";
        }
    }

    /**
     * @param $userEmail
     *
     * @return null|static|User
     */
    protected function findUser($userEmail)
    {
        if (!$user = User::findByEmail($userEmail)) {
            throw new InvalidParamException("Not found user by email {$userEmail}");
        }
        return $user;
    }

    /**
     * @param $roleName
     *
     * @return null|\yii\rbac\Role
     * @throws \yii\console\Exception
     */
    private function findRole($roleName)
    {
        if (!$role = $this->getAuthManager()->getRole($roleName)) {
            throw new InvalidParamException("Not found role {$roleName}");
        }
        return $role;
    }

    /**
     * @return \yii\rbac\ManagerInterface
     * @throws \yii\console\Exception
     */
    private function getAuthManager()
    {
        if (!$authManager = Yii::$app->getAuthManager()) {
            throw new Exception("AuthManager not initialized");
        }
        return $authManager;
    }
}