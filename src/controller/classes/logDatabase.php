<?php
    namespace App\Log;

    use App\DataBase\Connect\DataBase;
  
    require_once __DIR__.'\..\..\model\db\database.php';
    require_once __DIR__.'\..\..\model\interfaces\logInterface.php';


    readonly class LogDB implements \LogInterface {
        public static function create(Log $log): void
        {
            $conn = new DataBase();
            $conn = $conn->connect();
            
            $message = $log->LogMessage;
            $Logtype = $log->ActType->value;
            $LogDate = $log->CreationDate;
            
            $ValuesToBeInsertDB = [$LogDate, $Logtype, $message];

            $sql = "INSERT INTO LOG(LOG_CREATION, LOG_TYPE, LOG_MESSAGE) VALUES(?, ?, ?);";
            $query = $conn->prepare($sql);
            $query->execute($ValuesToBeInsertDB);
            
            $conn = null;
        }

        public static function delete(): void 
        {
            $conn = new DataBase();
            $conn = $conn->connect();

            $sql = "TRUNCATE TABLE LOG";

            $query = $conn->prepare($sql);
            $query->execute();

            $conn = null;
        }
        
    }