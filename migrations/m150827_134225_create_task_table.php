<?php

use app\components\MigrationTrait;
use yii\db\Migration;

class m150827_134225_create_task_table extends Migration
{
    use MigrationTrait;

    public function up()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->bigPrimaryKey()->notNull(),
            'title' => $this->string(255)->notNull(),
            'user_id' => $this->integer()->notNull(),
            'project_id' => $this->integer()->notNull(),
            'description' => $this->text(),
            'completion' => $this->integer()->defaultValue(0),
            'time' => $this->integer()->defaultValue(0),
            'assigned_user_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $this->getTableOptions());

        $this->addForeignKey('fk-task-user', '{{%task}}', 'user_id',
            '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-task-assigned_user', '{{%task}}', 'assigned_user_id',
            '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-task-project', '{{%task}}', 'project_id',
            '{{%project}}', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-task-assigned_user', '{{%task}}');
        $this->dropForeignKey('fk-task-user', '{{%task}}');
        $this->dropForeignKey('fk-task-project', '{{%task}}');
        $this->dropTable('{{%task}}');
    }
}
