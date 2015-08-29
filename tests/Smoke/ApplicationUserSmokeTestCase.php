<?php

namespace Test\Smoke;

use YIPL\Hookah\Test\Smoke\BaseUserTestCase;

class ApplicationUserSmokeTestCase extends BaseUserTestCase
{
    /**
     * @var string
     */
    protected $baseUrl = 'http://laravel5-geshan.rhcloud.com/';

    /**
     * @var string
     */
    protected $loginPath = 'auth/login';

    /**
     * @var string
     */
    protected $usernameField = 'email';

    /**
     * @var string
     */
    protected $passwordField = 'password';

    /**
     * @var string
     */
    protected $submitButtonText = 'Login';

    /**
     * @var array
     */
    protected $users =  [
        ['role'=> 'admin', 'identifier' => 'admin@admin.com', 'password' => '123admin'],
    ];

    /**
     * @var string
     */
    protected $loggedInLinkText = 'Logout';

    /**
     * Constructor
     *
     * @param null   $name
     * @param array  $data
     * @param string $dataName
     */
    public function __construct($name = null, $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }
}
