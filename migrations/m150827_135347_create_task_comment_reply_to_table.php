<?php

use app\components\MigrationTrait;
use yii\db\Migration;

class m150827_135347_create_task_comment_reply_to_table extends Migration
{
    use MigrationTrait;

    public function up()
    {
        $this->createTable('{{%task_comment_reply_to}}', [
            'task_comment_id' => $this->bigInteger()->notNull(),
            'reply_to_id' => $this->bigInteger()->notNull(),
        ], $this->getTableOptions());

        $this->addForeignKey('fk-task_comment_reply_to-task_comment', '{{%task_comment_reply_to}}', 'task_comment_id',
            '{{%task_comment}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-task_comment_reply_to-reply_to', '{{%task_comment_reply_to}}', 'reply_to_id',
            '{{%task_comment}}', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-task_comment_reply_to-task_comment', '{{%task_comment_reply_to}}');
        $this->dropForeignKey('fk-task_comment_reply_to-reply_to', '{{%task_comment_reply_to}}');
        $this->dropTable('{{%task_comment_reply_to}}');
    }
}
