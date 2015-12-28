<?php
namespace Simplia\GhostingClient;

class Client {
    protected $login;
    protected $password;
    /**
     * @var Soap
     */
    protected $client;

    function __construct($login, $password) {
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @return Soap
     */
    public function getClient() {
        if(!$this->client) {
            $this->client = new Soap(
                'http://api.controlpanel.cz/cmd.php?wsdl', [
                'login' => $this->login,
                'password' => $this->password,
            ]);
        }
        return $this->client;
    }

    /**
     * @param $domain
     * @return array
     */
    public function doesDomainExists($domain) {
        try {
            $this->getClient()->EmailGetList($domain);
        } catch (\SoapFault $e) {
            if($e['faultcode'] === '100|004') {
                return false;
            }
            throw $this->createException($e);
        }
        return true;
    }

    private function createException(\SoapFault $e) {
        return new IOException($e->getMessage(), $e->getCode(), $e);
    }
}
