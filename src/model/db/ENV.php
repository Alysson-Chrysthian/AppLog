<?php
    namespace App\DataBase\Connect;
    use Dotenv\Dotenv;
    
    require __DIR__.'\..\lib\PHPDotENV\vendor\autoload.php';

    readonly class ENV {
        private Dotenv $DotEnvLoad;
        private const DotEnvLoad = __DIR__.'\..'; 

        protected static function LoadDotEnv(): void 
        {
            $DotEnvLoad = Dotenv::createImmutable(self::DotEnvLoad);
            $DotEnvLoad->load();
        }
        
    }