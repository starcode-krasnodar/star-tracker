<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%task}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $user_id
 * @property integer $project_id
 * @property string $description
 * @property integer $completion
 * @property double $time
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Project $project
 * @property User $user
 * @property User $assignedUser
 * @property TaskComment[] $taskComments
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%task}}';
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
            [['title', 'user_id', 'project_id'], 'required'],
            [['user_id', 'completion', 'project_id', 'created_at', 'updated_at'], 'integer'],
            [['time'], 'double'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['assigned_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['assigned_user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'user_id' => Yii::t('app', 'User ID'),
            'project_id' => Yii::t('app', 'Project ID'),
            'description' => Yii::t('app', 'Description'),
            'completion' => Yii::t('app', 'Completion percentage'),
            'time' => Yii::t('app', 'Time in hours'),
            'assigned_user_id' => Yii::t('app', 'Assigned user ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssignedUser()
    {
        return $this->hasOne(User::className(), ['id' => 'assigned_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskComments()
    {
        return $this->hasMany(TaskComment::className(), ['task_id' => 'id']);
    }
}
