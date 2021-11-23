<?php

use Bitrix\Main\Localization\Loc;

global $APPLICATION;

Loc::loadMessages(__FILE__);
$moduleId = getModuleId(__DIR__);

CAdminMessage::ShowNote(Loc::getMessage($moduleId . "_UNSTEP_BEFORE") . " " . Loc::getMessage($moduleId . "_UNSTEP_AFTER"))
?>

<form action="<?php echo($APPLICATION->GetCurPage()); ?>">
    <input type="hidden" name="lang" value="<?php echo(LANG); ?>"/>
    <input type="submit" value="<?php echo(Loc::getMessage($moduleId . "_UNSTEP_SUBMIT_BACK")); ?>">
</form>