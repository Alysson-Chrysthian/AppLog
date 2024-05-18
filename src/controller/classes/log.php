<?php
    namespace App\Log;

    require_once __DIR__.'\logFile.php';
    require_once __DIR__.'\logDatabase.php';

    class Log {
        public string $CreationDate;
        public LogActType $ActType;
        public LogSaveType $SaveType;
        public string $LogMessage;

        public function SetLogInfo(LogActType $ActType, LogSaveType $SaveType, string $Message)
        {
            $this->ActType = $ActType;
            $this->SaveType = $SaveType;  
            $this->LogMessage = $Message;
        }

        public function create(): void
        {
            $this->SetCreationTime();
            switch ($this->SaveType) {
                case LogSaveType::LOG_FILE:
                    LogFile::create($this);
                    break;
                case LogSaveType::LOG_DB:
                    LogDB::create($this);
                    break;
                default:
                    print('Modo de salvamento selecionado nao existe');
                    break;        
            }
        }

        public function delete(LogSaveType $SaveType = null): void 
        {
            if (isset($SaveType)) {
                $this->SetSaveType($SaveType);
            }
            switch($this->SaveType) {
                case LogSaveType::LOG_FILE:
                    LogFile::delete();
                    break;
                case LogSaveType::LOG_DB:
                    LogDB::delete();
                    break;
                default:
                    print('Algo deu errado');
                    break;    
            }
        }

        private function SetSaveType(LogSaveType $SaveType)
        {
            $this->SaveType = $SaveType;   
        }

        private function SetCreationTime(): void
        {
            date_default_timezone_set('America/Fortaleza');
            $dateTime = date('Y-m-d H:i:s');
            $this->CreationDate = $dateTime;
        }
        
    }