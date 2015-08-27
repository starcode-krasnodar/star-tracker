<?php

use app\components\AuthManagerMigrationTrait;
use yii\db\Migration;

class m150827_091039_create_user_role extends Migration
{
    use AuthManagerMigrationTrait;

    public function up()
    {
        $this->createRole('user', ['description' => 'Authorized user']);
    }

    public function down()
    {
        $this->dropRole('user');
    }
}
