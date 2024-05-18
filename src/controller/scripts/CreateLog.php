<?php
    require __DIR__.'\..\classes\log.php';
    require __DIR__.'\..\..\model\enums\logEnum.php';
    
    use App\Log\Log;
    use App\Log\LogActType;
    use App\Log\LogSaveType;

    $RedirectUrl = 'location: ../../view/pages/CreateLog.html';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Message = $_POST['message'];
        $Method = (int) $_POST['Method'];
        $LogType = (int) $_POST['LogType'];

        $LogType = match($LogType) {
            1 => LogActType::LOG_LOGIN_USER,
            2 => LogActType::LOG_CREATE_USER,
            3 => LogActType::LOG_DELETE_USER,
            4 => LogActType::LOG_UPDATE_USER,
            default => false 
        };

        $Method = match($Method) {
            1 => LogSaveType::LOG_FILE,
            2 => LogSaveType::LOG_DB,
            default => false              
        };

        if (!$Method || !$LogType) {
            header($RedirectUrl);
            die();
        }

        $log = new Log();
        $log->SetLogInfo($LogType, $Method, $Message);    
        $log->create();
    }

    header($RedirectUrl);