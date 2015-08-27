<?php

namespace app\components;

use Yii;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\rbac\DbManager;

/**
 * Extend base Migration class.
 */
trait AuthManagerMigrationTrait
{
    /**
     * @param string $name
     * @param array $options
     *
     * @return \yii\rbac\Role
     * @throws \yii\base\InvalidConfigException
     */
    protected function createRole($name, $options = [])
    {
        $role = $this->getAuthManager()->createRole($name);
        if (isset($options['description'])) {
            $role->description = $options['description'];
        }
        if (!$this->getAuthManager()->add($role)) {
            throw new \RuntimeException('Adding role fail');
        }
        return $role;
    }

    /**
     * @param string $name
     *
     * @throws \yii\base\InvalidConfigException
     */
    protected function dropRole($name)
    {
        $role = $this->getAuthManager()->getRole($name);
        if ($role) {
            if (!$this->getAuthManager()->remove($role)) {
                throw new \RuntimeException('Drop role failed');
            }
        }
    }

    /**
     * @param string $name
     * @param string $child
     *
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     */
    protected function addChildRole($name, $child)
    {
        $role = $this->getAuthManager()->getRole($name);
        if (!$role) {
            throw new Exception("Role $name not found");
        }
        $childRole = $this->getAuthManager()->getRole($child);
        if (!$childRole) {
            throw new Exception("Child role $name not found");
        }
        if (!$this->getAuthManager()->addChild($role, $childRole)) {
            throw new Exception("Error add child role");
        }
    }

    /**
     * @param string $name
     * @param string $child
     *
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     */
    protected function dropChildRole($name, $child)
    {
        $role = $this->getAuthManager()->getRole($name);
        if (!$role) {
            throw new Exception("Role $name not found");
        }
        $childRole = $this->getAuthManager()->getRole($child);
        if (!$childRole) {
            throw new Exception("Child role $name not found");
        }
        if (!$this->getAuthManager()->removeChild($role, $childRole)) {
            throw new Exception("Error drop child role");
        }
    }

    /**
     * @return \yii\rbac\DbManager
     * @throws \yii\base\InvalidConfigException
     */
    protected function getAuthManager()
    {
        $authManager = Yii::$app->getAuthManager();
        if (!$authManager instanceof DbManager) {
            throw new InvalidConfigException('You should configure "authManager" component to use database before executing this migration.');
        }
        return $authManager;
    }
}