# Hookah integrated in Laravel app

This is an example [hookah](https://github.com/younginnovations/hookah) integration with laravel app.

![hookah-laravel](https://cloud.githubusercontent.com/assets/170554/10563745/749d7196-75a7-11e5-826c-fd995315fcdf.jpg)

## Build Status

[![wercker status](https://app.wercker.com/status/89ba09c2ac06307108ee6ef3a6800dc0/m/master "wercker status")](https://app.wercker.com/project/bykey/89ba09c2ac06307108ee6ef3a6800dc0)

## Patch

You can directly apply this [patch](https://patch-diff.githubusercontent.com/raw/younginnovations/hookah-laravel/pull/1.patch) 
file if its easy or just copy the `tests\Smoke` folder and adapt it to your application.

## Main things to consider

* Add `"yipl/hookah":	"~0.4"` to your require-dev part of composer.json

* Run `composer update --prefer-dist` , push your lock file too when you push the change.

* Check if the tests are in a namespace, in your composer.json file. If not change it to below:

```
"autoload-dev": {
	  "psr-4": {
		"Test\\": "tests"
	  }
	},
```

* Change the base URL at 2 places (yes its quite lame but that's the price we paid for simplicity), first in 
`ApplicationSmokeTestCase`  at line 9 for front end tests without logging in, and `ApplicationUserSmokeTestCase` at
line 12 for back end tests for logged in users.

```
 protected $baseUrl = 'http://laravel5-geshan.rhcloud.com/';
```
You can test the changes in local/development or your staging/live environment too by changing the above URL.

* Then change the following as per need in `ApplicationUserSmokeTestCase`, we assume the variables are descriptive enough :)

```
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

```

* Rename `ApplicationSmokeTestCase` and `ApplicationUserSmokeTestCase` to your application name for the `Application` word
like `ResourceContractsSmokeTestCase` and `ResourceContractsUserSmokeTestCase`.

* Open `AdminUserTest` extend it from `ResourceContractsUserSmokeTestCase` and adjust class use accordingly.
* Adjust the backed user test-case path as per your application paths.
```
 $adminPaths = [
            ['home', 200],
            ['logged-in', 200],
            ['not-existing', 404]
        ];
```
* Open `AdminUserTest` extend it from `ResourceContractsUserSmokeTestCase` and adjust class use accordingly.
* Adjust the front end user test cases as per your application paths:
 ```
 
        return [
            [$this->baseUrl, 200],
            ['about', 200],
            ['auth/login', 200],
            ['auth/register', 200],
            ['not-existing', 404],
            ['.git', 404],
        ];
```
* Run your tests with `/vendor/bin/phpunit` they should be fine like seen below :

![Hookah Laravel Integration](https://s3-ap-southeast-1.amazonaws.com/uploads-ap.hipchat.com/140261/1343070/kLcC18NyB54yWTO/hookah-laravel-5.png "Hookah Laravel Integration")
