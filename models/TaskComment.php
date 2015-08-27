<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%task_comment}}".
 *
 * @property integer $id
 * @property integer $task_id
 * @property integer $user_id
 * @property string $body
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 * @property Task $task
 * @property TaskCommentReplyTo[] $taskCommentReplyTos
 * @property TaskCommentReplyTo[] $taskCommentReplyTos0
 */
class TaskComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%task_comment}}';
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
            [['task_id', 'user_id', 'body'], 'required'],
            [['task_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['body'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'task_id' => Yii::t('app', 'Task ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'body' => Yii::t('app', 'Body'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
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
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskCommentReplyTos()
    {
        return $this->hasMany(TaskCommentReplyTo::className(), ['reply_to_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskCommentReplyTos0()
    {
        return $this->hasMany(TaskCommentReplyTo::className(), ['task_comment_id' => 'id']);
    }
}
