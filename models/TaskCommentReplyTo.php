<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%task_comment_reply_to}}".
 *
 * @property integer $task_comment_id
 * @property integer $reply_to_id
 *
 * @property TaskComment $replyTo
 * @property TaskComment $taskComment
 */
class TaskCommentReplyTo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%task_comment_reply_to}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_comment_id', 'reply_to_id'], 'required'],
            [['task_comment_id', 'reply_to_id'], 'integer'],
            [['reply_to_id'], 'exist', 'skipOnError' => true, 'targetClass' => TaskComment::className(), 'targetAttribute' => ['reply_to_id' => 'id']],
            [['task_comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => TaskComment::className(), 'targetAttribute' => ['task_comment_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'task_comment_id' => Yii::t('app', 'Task Comment ID'),
            'reply_to_id' => Yii::t('app', 'Reply To ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReplyTo()
    {
        return $this->hasOne(TaskComment::className(), ['id' => 'reply_to_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskComment()
    {
        return $this->hasOne(TaskComment::className(), ['id' => 'task_comment_id']);
    }
}
