<?php

namespace Test\Smoke;

use YIPL\Hookah\Test\Smoke\BaseTestCase;

class ApplicationSmokeTestCase extends BaseTestCase
{
    protected $baseUrl = 'http://laravel5-geshan.rhcloud.com/';

    public function __construct($name = null, $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }
}
