<?php

namespace common\models\entity;

use Yii;

/**
 * This is the model class for table "submenu".
 *
 * @property integer $id
 * @property integer $id_menu
 * @property string $sub_title
 * @property string $sub_url
 * @property integer $status
 * @property integer $category_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property Menu $idMenu
 */
class Submenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            \yii\behaviors\TimestampBehavior::className(),
            \yii\behaviors\BlameableBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'submenu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_menu', 'sub_title', 'sub_url', 'status'], 'required'],
            [['id_menu', 'status', 'category_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['sub_title', 'sub_url'], 'string', 'max' => 50],
            [['id_menu'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['id_menu' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_menu' => 'Menu Utama',
            'sub_title' => 'Judul Submenu',
            'sub_url' => 'Sub Url',
            'status' => 'Status',
            'category_id' => 'Category',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMenu()
    {
        return $this->hasOne(Menu::className(), ['id' => 'id_menu']);
    }
}
