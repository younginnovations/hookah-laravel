<?php

namespace Test\Smoke\BackEnd;

use Test\Smoke\ApplicationUserSmokeTestCase;

class AdminUserTest extends ApplicationUserSmokeTestCase
{
    /**
     * @var string
     */
    protected $userRole = 'admin';

    public function __construct($name = null, $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    /**
     * List all your admin role paths below
     *
     * @return array
     */
    public function providerAdminPaths()
    {
        $adminPaths = [
            ['home', 200],
            ['logged-in', 200],
            ['not-existing', 404]
        ];

        return $adminPaths;
    }

    /**
     *
     * @throws \Exception
     */
    public function testAdminPageAccessIsOk()
    {
        $this->printSeparator();
        $this->printLn(sprintf('Testing for : %s', $this->baseUrl));

        foreach ($this->providerAdminPaths() as $adminPath) {
            $this->printLn(
                sprintf(
                    'Testing path %s to have response code %s for user %s, role %s',
                    $adminPath[0],
                    $adminPath[1],
                    $this->user['identifier'],
                    $this->user['role']
                )
            );
            $this->makeAuthenticatedCall('GET', $adminPath[0], $adminPath[1]);
        }
    }

}
