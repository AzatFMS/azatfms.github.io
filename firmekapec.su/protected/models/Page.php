<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property integer $id
 * @property string $alias
 * @property string $title
 * @property string $keywords
 * @property string $content
 * @property string $created
 */
class Page extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Page the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'pages';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('alias, title, keywords, content', 'required'),
            array(
                'alias',
                'match',
                'pattern' => '/^[a-z0-9_]+$/',
                'message' => 'Недопустимые символы в поле Псевдоним'
            ),
            array('alias, title, keywords', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, alias, title, keywords, content, created', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return bool|void
     */
    protected function beforeSave()
    {
        if (parent::beforeSave())
        {
            $criteria = new CDbCriteria();
            $criteria->compare('alias', $this->alias);
            if (!$this->isNewRecord) {
                $criteria->compare('id', '!='.$this->id);
            }
            if (self::model()->find($criteria)) {
                $this->addError('alias', 'Такой псевдоним уже занят. Выберите другой.');
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'alias' => 'Псевдоним',
            'title' => 'Название',
            'keywords' => 'Ключевые слова',
            'content' => 'Текст',
            'created' => 'Дата создания',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('keywords', $this->keywords, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('created', $this->created, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}