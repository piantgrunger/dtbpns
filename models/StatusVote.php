<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_vote".
 *
 * @property int|null $coin_id
 * @property float|null $vote_today
 * @property float|null $vote_alltime
 */
class StatusVote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status_vote';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coin_id'], 'integer'],
            [['vote_today', 'vote_alltime'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'coin_id' => 'Coin ID',
            'vote_today' => 'Vote Today',
            'vote_alltime' => 'Vote Alltime',
        ];
    }
}
