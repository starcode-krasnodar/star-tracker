<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%team_work_user}}".
 *
 * @property integer $team_work_id
 * @property integer $user_id
 *
 * @property User $user
 * @property TeamWork $teamWork
 */
class TeamWorkUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%team_work_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['team_work_id', 'user_id'], 'required'],
            [['team_work_id', 'user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['team_work_id'], 'exist', 'skipOnError' => true, 'targetClass' => TeamWork::className(), 'targetAttribute' => ['team_work_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'team_work_id' => Yii::t('app', 'Team Work ID'),
            'user_id' => Yii::t('app', 'User ID'),
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
    public function getTeamWork()
    {
        return $this->hasOne(TeamWork::className(), ['id' => 'team_work_id']);
    }
}
