<?php namespace AdamWathan\FluentRouter\Facades;

use Illuminate\Support\Facades\Facade;

class Route extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'adamwathan.router';
    }
}
