<?php
use \Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;

$context = Application::getInstance()->getContext();
$request = $context->getRequest();

$moduleId = 'meven.info';

\Bitrix\Main\Loader::includeModule($moduleId);

$aTabs = [
    [
        'DIV' => 'my_options',
        'TAB' =>  Loc::getMessage('info.SETTINGS.PHONE.TAB'),
        'OPTIONS' => [
            "",
            ['phone',
                Loc::getMessage('info.SETTINGS.PHONE'),
                null,
                ['text', 52],
            ],
            ['phone2',
                Loc::getMessage('info.SETTINGS.PHONE2'),
                null,
                ['text', 52],
            ],
            ['email',
                'E-mail',
                null,
                ['text', 52],
            ],
            ['email2',
                'E-mail 2',
                null,
                ['text', 52],
            ],
            ['timetable',
                Loc::getMessage('info.SETTINGS.TIMETABLE'),
                null,
                ['text', 52],
            ],
            ['adres',
                Loc::getMessage('info.SETTINGS.ADRES'),
                null,
                ['text', 52],
            ],
            ['index',
                Loc::getMessage('info.SETTINGS.INDEX'),
                null,
                ['text', 52],
            ],
            ['company',
                Loc::getMessage('info.SETTINGS.NAME.COMPANY'),
                null,
                ['text', 52],
            ],
            ['adr',
                Loc::getMessage('info.SETTINGS.ADR'),
                null,
                ['text', 52],
            ],
            ['note' => Loc::getMessage('info.SETTINGS.INFO')],
        ]
    ]
];

if ($request->isPost() && strlen($request->getPost('save')) > 0) {
    foreach ($aTabs as $aTab)
    {
        __AdmSettingsSaveOptions($moduleId, $aTab['OPTIONS']);
    }

    LocalRedirect($APPLICATION->GetCurPage() . '?lang=' . LANGUAGE_ID . '&mid_menu=1&mid=' . urlencode($moduleId) .
        '&tabControl_active_tab=' . urlencode($_REQUEST['tabControl_active_tab']));
}


$tabControl = new CAdminTabControl('tabControl', $aTabs);


?>
    <form method="post" action="<?=$APPLICATION->GetCurPage()?>?lang=ru&mid=<?=$moduleId?>&mid_menu=1" name='bootstrap'>
   
        <? $tabControl->Begin();

        foreach ($aTabs as $aTab)
        {
            $tabControl->BeginNextTab();
            __AdmSettingsDrawList($moduleId, $aTab['OPTIONS']);
        }
        $tabControl->Buttons(array('btnApply' => false, 'btnCancel' => false, 'btnSaveAndAdd' => false)); ?>

        <?= bitrix_sessid_post(); ?>
        <? $tabControl->End(); ?>
    </form>
<?
