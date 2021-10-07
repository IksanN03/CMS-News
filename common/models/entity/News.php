<?php

namespace common\models\entity;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property integer $category_id
 * @property integer $publish_at
 * @property integer $author_id
 * @property string $content
 * @property string $photo
 * @property integer $views
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property Files[] $files
 * @property User $author
 * @property Category $category
 * @property User $createdBy
 * @property User $updatedBy
 */
class News extends \yii\db\ActiveRecord
{
    use \mdm\behaviors\ar\RelationTrait;
    /**
     * @inheritdoc
     */
    const STATUS_DRAF = 0;
    const STATUS_PUBLISH = 1;
    const STATUS_BANNED = 2;


    public static function statuses($index = 'all', $html = false, $cssClass = '')
    {
        $array = [
            self::STATUS_DRAF => 'Draf',
            self::STATUS_PUBLISH => 'Publish',
            self::STATUS_BANNED => 'Banned',
        ];
        if ($html) $array = [
            self::STATUS_DRAF => '<span class="label label-default label-inline nowrap">Draf</span>',
            self::STATUS_PUBLISH => '<span class="label label-success label-inline nowrap">Publish</span>',
            self::STATUS_BANNED => '<span class="label label-danger label-inline nowrap">Banned</span>',
        ];
        if (isset($array[$index])) return $array[$index];
        if ($index === 'all') return $array;
        return null;
    }

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
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'author_id', 'content', 'status'], 'required'],
            [['category_id', 'publish_at', 'author_id', 'views', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['content'], 'string'],
            [['title', 'photo'], 'string', 'max' => 225],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['subcategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategory::className(), 'targetAttribute' => ['subcategory_id' => 'id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Judul Berita',
            'category_id' => 'Nama Kategori',
            'subcategory_id' => 'Nama SubKategori',
            'publish_at' => 'Tanggal Publish',
            'author_id' => 'Nama Penulis',
            'content' => 'isi Berita',
            'photo' => 'Foto',
            'views' => 'views',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(Files::className(), ['news_id' => 'id']);
    }

    public function setFiles($value)
    {
        $this->loadRelated('files', $value);
    }

    public static function uploadableFields()
    {
        return [
            'photo'
        ];
    }

    public function getStatusText()
    {
        return self::statuses($this->status, false);
    }

    public function getStatusHtml()
    {
        return self::statuses($this->status, true);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
    public function getSubcategory()
    {
        return $this->hasOne(Subcategory::className(), ['id' => 'subcategory_id']);
    }
}
