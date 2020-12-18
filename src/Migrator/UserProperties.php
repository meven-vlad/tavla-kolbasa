<?php

namespace Meven\Migrator;

class UserProperties
{
    public $setting;
    
    public $entityId;

    public function __construct($type, $code, $name)
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $this->code = $code;
        $this->type = $type;
        $this->name = $name;
        $this->sort = 500;
        $this->multiple = "Y";
        $this->setting = [
            'DEFAULT_VALUE' => '',
            'SIZE' => '20',
            'ROWS' => '1',
            'MIN_LENGTH' => '0',
            'MAX_LENGTH' => '0',
            'REGEXP' => '',
        ];
        $this->entityId = 'USER';

    }

    public function create()
    {
        $element = [
            'ENTITY_ID' => $this->entityId,
            'FIELD_NAME' => 'UF_'.$this->code,
            'USER_TYPE_ID' =>  $this->type,
            'XML_ID' => 'XML_ID_'.$this->code,
            'SORT' => $this->sort,
            'MULTIPLE' => $this->multiple,
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => 'Y',
            'EDIT_IN_LIST' => 'Y',
            'IS_SEARCHABLE' => 'N',
            'SETTINGS' => $this->setting,
            'EDIT_FORM_LABEL' => array(
                'ru' => $this->name,
                'en' => $this->name,
            ),
            'LIST_COLUMN_LABEL' => array(
                'ru' => $this->name,
                'en' => $this->name,
            ),
            'LIST_FILTER_LABEL' => array(
                'ru' => $this->name,
                'en' => $this->name,
            ),
            'ERROR_MESSAGE' => array(
                'ru' => 'Ошибка при заполнении пользовательского свойства',
                'en' => 'An error in completing the user field',
            ),
            'HELP_MESSAGE' => array(
                'ru' => '',
                'en' => '',
            ),
        ];

        $userProp = new \CUserTypeEntity();
        $iUserFieldId   = $userProp->Add( $element );
    }
}
