<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblcontacts".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $company
 * @property string $address
 * @property string $phone
 * @property string $mobile
 * @property string $fax
 * @property string $pemail
 * @property string $semail
 * @property string $country
 * @property string $websiteurl
 * @property int $gender 1=male,2=female,3=shemale
 * @property string $birthday
 * @property int $status 1=Active,2=Inactive
 * @property int $sentstatus 1=sent,2=not sent
 * @property string $addeddate
 * @property string $updateddate
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblcontacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'firstname', 'lastname', 'company', 'address', 'phone', 'mobile', 'fax', 'pemail', 'semail', 'country', 'websiteurl', 'gender', 'birthday', 'addeddate', 'updateddate'], 'required'],
            [['id', 'gender', 'status', 'sentstatus'], 'integer'],
            [['address'], 'string'],
            [['addeddate', 'updateddate'], 'safe'],
            [['firstname', 'lastname', 'company', 'pemail', 'semail', 'websiteurl'], 'string', 'max' => 100],
            [['phone', 'mobile', 'fax'], 'string', 'max' => 50],
            [['country'], 'string', 'max' => 55],
            [['birthday'], 'string', 'max' => 10],
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
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'company' => 'Company',
            'address' => 'Address',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'fax' => 'Fax',
            'pemail' => 'Pemail',
            'semail' => 'Semail',
            'country' => 'Country',
            'websiteurl' => 'Websiteurl',
            'gender' => 'Gender',
            'birthday' => 'Birthday',
            'status' => 'Status',
            'sentstatus' => 'Sentstatus',
            'addeddate' => 'Addeddate',
            'updateddate' => 'Updateddate',
        ];
    }

    public function getGroups() {
        return $this->hasMany(Groups::className(), ['id' => 'group_id'])->viaTable('tblcontactsgroups', ['contact_id' => 'id']);
    }
}
