<?php
namespace Meven\Helper\Sms;

use Bitrix\Main\PhoneNumber\Format;
use Bitrix\Main\PhoneNumber\Parser;

class Sms
{
    private static $url = 'https://smsc.ru/sys/send.php';
    private $data = [];

    public function __construct()
    {
        $this->data['login'] = 'v.dyachenko';
        $this->data['psw'] = 'qwe123';
    }
    
    // сохраняем телефон
    public function setPhone(string $phone)
    {
        $this->data['phones'] = Sms::sanitizer($phone);
    }

    //сообщение
    public function setMessage(string $message)
    {
        $this->data['mes'] = $message;
    }

    //sanitizer
    public static function sanitizer($phone)
    {
        $parsedPhone = Parser::getInstance()->parse($phone);
        $resPhone = $parsedPhone->format(Format::NATIONAL);
        return str_replace(['-', '+', '(', ')', ' '], '', $resPhone);
    }

    //отправка
    public function send()
    {
        if ($this->data['phones'] === null || $this->data['mes'] === null)
            echo "error";

        $HttpClient = new \Bitrix\Main\Web\HttpClient();
        $uri = new \Bitrix\Main\Web\Uri(self::$url);
        $uri->addParams($this->data);

        $HttpClient->query("GET", $uri->getUri());
    }
}
