<?php


use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdLdapTest extends TestCase
{
    use DatabaseTransactions, DatabaseMigrations;

    public $ldap_config = [];

    public $skipLdap    = false;

    public function setUp()
    {
        parent::setUp();

        $this->skipLdap = env('LDAP_SKIP_TESTS', false);

        $this->ldap_config = [
            'account_suffix'     => env('LDAP_ACCOUNT_SUFFIX'),
            'domain_controllers' => [env('LDAP_DOMAIN_CONTROLLER')],
            'base_dn'            => env('LDAP_BASE_DN'),
            'admin_username'     => env('LDAP_ADMIN_USER'),
            'port'               => env('LDAP_PORT', 389),
        ];
    }

    /**
     * @test
     *
     * A basic test example.
     *
     * @return void
     */
    public function can_connect_to_ldap_server()
    {
        if ($this->skipLdap) {
            return;
        }
        $adldap = new \Adldap\Adldap($this->ldap_config);

        $this->assertTrue($adldap->getConnection()->isBound());
    }

    /**
     * @test
     *
     * Check if we can connect
     *
     * @return void
     */
    public function can_login_with_user()
    {
        if ($this->skipLdap) {
            return;
        }

        $auth = Auth::attempt(
            [
                'username' => env('LDAP_TEST_USER'),
                'password' => env('LDAP_TEST_USER_PASS'),
            ]
        );
        $this->assertTrue($auth);
    }
}
