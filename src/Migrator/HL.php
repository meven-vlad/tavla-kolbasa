<?php
namespace Meven\Migrator;
Loader::includeModule("highloadblock"); 
use Bitrix\Highloadblock; 
use Bitrix\Main\Entity;

class HL
{
    
    public function __construct(string $name)
    {
        $hlbl = $this->getIdHL();
        $hlblock = HL\HighloadBlockTable::getById($hlbl)->fetch(); 
        $entity = HL\HighloadBlockTable::compileEntity($hlblock); 
        $this->$entity_data_class = $entity->getDataClass();
    }

    public function getIdHL($name)
    {
        $hlblock = Highloadblock\HighloadBlockTable::getList([
            'select' => ['ID'],
            'filter' => ['=TABLE_NAME' => $name]
        ])->fetch();

        return $hlblock['ID'];
    }

    public function getIdEl()
    {
        $rsData = $this->$entity_data_class::getList(array(
            "select" => array("*"),
            "order" => array("ID" => "ASC"),
            "filter" => array("UF_CATEGORY"=>['Тренинги', 'Модераци/фасилитации', 'Найти коуча'])  
         ));
        
        while($arData = $rsData->Fetch()){
            $arrId[] = $arData['ID'];
        }
        return $arrId;
    }

   
}
