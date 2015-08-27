<?php

use app\components\MigrationTrait;
use yii\db\Migration;

class m150827_134616_create_task_comment_table extends Migration
{
    use MigrationTrait;

    public function up()
    {
        $this->createTable('{{%task_comment}}', [
            'id' => $this->bigPrimaryKey()->notNull(),
            'task_id' => $this->bigInteger()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'body' => $this->text()->notNull(),
        ], $this->getTableOptions());

        $this->addForeignKey('fk-task_comment-task', '{{%task_comment}}', 'task_id',
            '{{%task}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-task_comment-user', '{{%task_comment}}', 'user_id',
            '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-task_comment-task', '{{%task_comment}}');
        $this->dropForeignKey('fk-task_comment-user', '{{%task_comment}}');
        $this->dropTable('{{%task_comment}}');
    }
}
