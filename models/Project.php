<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%project}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $team_work_id
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property TeamWork $teamWork
 * @property Task[] $tasks
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'team_work_id'], 'required'],
            [['team_work_id', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['team_work_id'], 'exist', 'skipOnError' => true, 'targetClass' => TeamWork::className(), 'targetAttribute' => ['team_work_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'team_work_id' => Yii::t('app', 'Team Work ID'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamWork()
    {
        return $this->hasOne(TeamWork::className(), ['id' => 'team_work_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['project_id' => 'id']);
    }
}
