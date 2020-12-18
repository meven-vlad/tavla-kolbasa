<?php
namespace Meven\Helper;

use Bitrix\Main\PhoneNumber\Format;
use Bitrix\Main\PhoneNumber\Parser;

Class Registration 
{
    private $data = [];

    public function __construct(array $property)
    {
        $this->data['property'] = $property;
        $phone = Sms::sanitizer($property['phone']);
        $this->data['phone'] = $phone;
    }

    /**
     * Генерирует код
     *
     * @return integer
     */
    public function generateCode(): int
    {
        return mt_rand(1000, 9999);
    }

    /**
     * добавление пользователя
     *
     * @param string $code
     * @return integer
    */
    public function createUser(): int
    {
        $user = new \CUser;

        $arFields = Array(
          "NAME"              => "",
          "LAST_NAME"         => "",
          "EMAIL"             => $this->data['property']['email'],
          "LOGIN"             => $this->data['property']['email'],
          "LID"               => "ru",
          "PHONE_NUMBER"      => $this->data['property']['phone'],
          "WORK_PHONE"        => $this->data['property']['phone'],
          "ACTIVE"            => "Y",
          "GROUP_ID"          => $this->data['property']['type'],
          "PASSWORD"          => $this->data['property']['pass'],
          "CONFIRM_PASSWORD"  => $this->data['property']['pass'],
        );
        
        $userId = $user->Add($arFields);
        if (intval($userId) > 0)
            echo "Пользователь успешно добавлен.";
        else
            echo $user->LAST_ERROR;

        return $userId;
    }
}
