<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\services\auth\SignupService;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $snils
 * @property string $gender
 * @property int $birthday
 * @property string $age_flag
 * @property string $phone_main
 * @property string $phone_optional
 * @property string $address
 * @property string $rezume
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $email_confirm_token
 * @property int $role
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */

class UserInit extends User
{
    const ROLE_STAFF = 10;
    const ROLE_TEACHER = 20;
    const ROLE_STUDENT = 50;
    const ROLE_PARENT = 100;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
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
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surname', 'name', 'patronymic'], 'required'],
            [['surname', 'name', 'patronymic'], 'string', 'max' => 127],

            ['birthday', 'integer'],
            ['birthday', 'required'],

            [['gender', 'age_flag'], 'string'],
            [['gender', 'age_flag'], 'required'],

            ['snils', 'string', 'max' => 16],

            ['role', 'default', 'value' => self::ROLE_STAFF],
            ['role', 'in', 'range' => [ self::ROLE_STAFF, self::ROLE_TEACHER, self::ROLE_STUDENT, self::ROLE_PARENT]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'surname' => Yii::t('app', 'Surname'),
            'name' => Yii::t('app', 'Name'),
            'patronymic' => Yii::t('app', 'Patronymic'),
            'gender' => Yii::t('app', 'Gender'),
            'birthday' => Yii::t('app', 'Birthday'),
            'snils' => Yii::t('app', 'Snils'),
             ];
    }
}
