<?php

use app\components\MigrationTrait;
use yii\db\Migration;

class m150827_133740_create_project_table extends Migration
{
    use MigrationTrait;

    public function up()
    {
        $this->createTable('{{%project}}', [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string()->notNull(),
            'team_work_id' => $this->integer()->notNull(),
            'description' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $this->getTableOptions());

        $this->addForeignKey('fk-project-team_work', '{{%project}}', 'team_work_id',
            '{{%team_work}}', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-project-team_work', '{{%project}}');
        $this->dropTable('{{%project}}');
    }
}
