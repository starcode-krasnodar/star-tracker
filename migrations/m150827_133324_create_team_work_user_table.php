<?php

use app\components\MigrationTrait;
use yii\db\Migration;

class m150827_133324_create_team_work_user_table extends Migration
{
    use MigrationTrait;

    public function up()
    {
        $this->createTable('{{%team_work_user}}', [
            'team_work_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ], $this->getTableOptions());

        $this->addPrimaryKey('pk-team_work_user', '{{%team_work_user}}', ['team_work_id', 'user_id']);
        $this->addForeignKey('fk-team_work_user-team_work', '{{%team_work_user}}', 'team_work_id',
            '{{%team_work}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk-team_work_user-user', '{{%team_work_user}}', 'user_id',
            '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-team_work_user-user', '{{%team_work_user}}');
        $this->dropForeignKey('fk-team_work_user-team_work', '{{%team_work_user}}');
        $this->dropPrimaryKey('pk-team_work_user', '{{%team_work_user}}');
        $this->dropTable('{{%team_work_user}}');
    }
}
