<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblcontactsgroups".
 *
 * @property int $id
 * @property int $contact_id
 * @property int $group_id
 * @property string $dateadded
 */
class ContactsGroups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblcontactsgroups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'contact_id', 'group_id', 'dateadded'], 'required'],
            [['id', 'contact_id', 'group_id'], 'integer'],
            [['dateadded'], 'safe'],
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
            'contact_id' => 'Contact ID',
            'group_id' => 'Group ID',
            'dateadded' => 'Dateadded',
        ];
    }
}
