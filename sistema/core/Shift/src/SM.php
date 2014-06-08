<?php

namespace Shift;

class SM
{
    private static $serviceManager;
    private static $cliente;

    public static function setServiceManager($serviceManager)
    {
        self::$serviceManager = $serviceManager;
    }

    public static function get($serviceName)
    {
        return self::$serviceManager->get($serviceName);
    }
    
    public static function setCliente($cliente){
        
        return self::$cliente = $cliente;
    }
    
    public static function getCliente(){
        return self::$cliente;
    }
}
