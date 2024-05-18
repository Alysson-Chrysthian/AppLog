<?php
    require_once __DIR__.'\..\..\controller\classes\log.php';

    use App\Log\Log;
    
    interface LogInterface {
        static function create(Log $log): void;
        static function delete(): void;
    }