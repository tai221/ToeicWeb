<?php


namespace App;


class DemoFacade
{
    protected static function resolveInstance($name){
        return app()[$name];
    }

    public static  function __callStatic($name, $arguments)
    {
       return (self::resolveInstance(Demo::class))->$name(...$arguments);
    }
}
