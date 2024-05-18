<?php
    require_once __DIR__.'\..\classes\log.php';
    require_once __DIR__.'\..\..\model\enums\logEnum.php';

    use App\Log\Log;
    use App\Log\LogSaveType;

    $RedirectUrl = 'location: ../../view/pages/CreateLog.html';

    $log = new Log();
    $log->delete(LogSaveType::LOG_FILE);
    $log->delete(LogSaveType::LOG_DB);

    header($RedirectUrl);