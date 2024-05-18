<?php
    namespace App\Log;

    require_once __DIR__.'\..\..\model\interfaces\logInterface.php';


    readonly class LogFile implements \LogInterface {
        private const FILE_NAME = __DIR__.'\..\..\model\logs\log.txt';

        public static function create(Log $log): void 
        {
            $message = '['.$log->LogMessage.']';
            $type = '['.$log->ActType->value.']';
            file_put_contents(self::FILE_NAME, $message.'----'.$type.'----'."\n", FILE_APPEND);
        }

        public static function delete(): void
        {
            if (file_exists(self::FILE_NAME)) {
                unlink(self::FILE_NAME);
            }
        }

    }