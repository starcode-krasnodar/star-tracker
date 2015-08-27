<?php

use app\components\MigrationTrait;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    use MigrationTrait;

    public function up()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $this->getTableOptions());
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
