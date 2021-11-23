<?php

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
$moduleId = getModuleId(__DIR__);
$menu = [

    [
        'parent_menu' => 'global_menu_content',//определяем место меню, в данном случае оно находится в главном меню
        'sort' => 400,//сортировка, в каком месте будет находится наш пункт
        'text' => Loc::getMessage($moduleId . '_MENU_TITLE'),//описание из файла локализации
        'title' => Loc::getMessage($moduleId . '_MENU_TITLE'),//название из файла локализации
        'url' => 'mymodule_index.php',//ссылка на страницу из меню
        'items_id' => 'menu_references',//описание подпункта, то же, что и ранее, либо другое, можно вставить сколько угодно пунктов меню
        'items' => [
            [
                'text' => Loc::getMessage($moduleId . '_SUBMENU_TITLE'),
                'url' => 'mymodule_index.php?lang=' . LANGUAGE_ID,
                'more_url' => array('mymodule_index.php?lang=' . LANGUAGE_ID),
                'title' => Loc::getMessage($moduleId . '_SUBMENU_TITLE'),
            ],
        ],
    ],
];

return $menu;