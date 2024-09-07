<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblgroups".
 *
 * @property int $id
 * @property string $groupname
 * @property int $status 1=Acitve,2=Inactive
 * @property string $date
 */
class Groups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblgroups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'groupname', 'date'], 'required'],
            [['id', 'status'], 'integer'],
            [['date'], 'safe'],
            [['groupname'], 'string', 'max' => 150],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'groupname' => 'Groupname',
            'status' => 'Status',
            'date' => 'Date',
        ];
    }

    public function getContacts() {
        return $this->hasMany(Contacts::className(), ['id' => 'contact_id'])->viaTable('tblcontactsgroups', ['group_id' => 'id']);
    }
}
