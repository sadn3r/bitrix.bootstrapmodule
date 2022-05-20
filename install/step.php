<?php

use Bitrix\Main\Localization\Loc;

global $APPLICATION;

Loc::loadMessages(__FILE__);
$moduleId = "bitrix.bootstrapmodule";

if ($errorException = $APPLICATION->GetException()) {
    CAdminMessage::ShowMessage($errorException->GetString());
} else {
    CAdminMessage::ShowNote(Loc::getMessage($moduleId . '_STEP_BEFORE') . " " . Loc::getMessage($moduleId . '_STEP_AFTER'));
}
?>

<form action="<?php echo($APPLICATION->GetCurPage()); ?>">
    <input type="hidden" name="lang" value="<?php echo(LANG); ?>"/>
    <input type="submit" value="<?php echo(Loc::getMessage($moduleId . '_STEP_SUBMIT_BACK')); ?>">
</form>
