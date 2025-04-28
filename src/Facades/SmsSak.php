<?php

namespace Hamada\Laravel_SmsSak\Facades;

use Illuminate\Support\Facades\Facade;

class SmsSak extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'smssak';
    }
}
