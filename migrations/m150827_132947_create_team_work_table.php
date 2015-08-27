<?php

use app\components\MigrationTrait;
use yii\db\Migration;

class m150827_132947_create_team_work_table extends Migration
{
    use MigrationTrait;

    public function up()
    {
        $this->createTable('{{%team_work}}', [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(255)->notNull()->unique(),
            'description' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $this->getTableOptions());
    }

    public function down()
    {
        $this->dropTable('{{%team_work}}');
    }
}
