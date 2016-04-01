<?php
namespace Soukicz\GhostingClient;

use Soukicz\GhostingClient\Entity\Domain\Domain;
use Soukicz\GhostingClient\Entity\Domain\Mailbox;
use Soukicz\GhostingClient\Entity\Domain\Redirect;

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
    protected function getClient() {
        if(!$this->client) {
            $this->client = new Soap(
                'http://api.controlpanel.cz/cmd.php?wsdl', [
                'login' => $this->login,
                'password' => $this->password,
            ]);
        }
        return $this->client;
    }

    public function getDomains() {
        try {
            foreach ($this->getClient()->EmailGetDomainsList() as $data) {
                $domain = new Domain();
                $domain->setName((string)$data['name']);
                yield $domain;
            }
        } catch (\SoapFault $e) {
            throw $this->createException($e);
        }
    }

    public function getEmails($domainName) {
        try {
            foreach ($this->getClient()->EmailGetList($domainName) as $data) {
                $mailbox = new Mailbox();
                $mailbox
                    ->setName((string)$data['mailbox'])
                    ->setQuota((float)$data['quota'])
                    ->setSize((float)$data['size'])
                    ->setMessages((int)$data['messages'])
                    ->setMessagesQuota((int)$data['message_quota'])
                    ->setWebmailServer((string)$data['webmail_server'])
                    ->setSmtpServer((string)$data['smtp_server'])
                    ->setImapServer((string)$data['imap_server'])
                    ->setPop3Server((string)$data['pop3_server']);
                yield $mailbox;
            }
        } catch (\SoapFault $e) {
            throw $this->createException($e);
        }
    }

    public function getRedirects($domainName) {
        try {
            foreach ($this->getClient()->EmailGetRedirectsList($domainName) as $data) {
                $redirect = new Redirect();
                $redirect
                    ->setMailbox((string)$data['mailbox'])
                    ->setDestination((float)$data['destination'])
                    ->setCopy((bool)$data['copy']);
                yield $redirect;
            }
        } catch (\SoapFault $e) {
            throw $this->createException($e);
        }
    }

    public function changePassword($mailbox, $password) {
        try {
            $this->getClient()->EmailChangePassword(explode('@', $mailbox)[1], explode('@', $mailbox)[0], $password);
        } catch (\SoapFault $e) {
            throw $this->createException($e);
        }
    }

    public function deleteRedirect($source, $destination) {
        try {
            $this->getClient()->EmailRemoveRedirect(explode('@', $source)[1], explode('@', $source)[0], $destination);
        } catch (\SoapFault $e) {
            throw $this->createException($e);
        }
    }


    public function addDomain($domain) {
        try {
            $this->getClient()->EmailDomainAdd($domain);
        } catch (\SoapFault $e) {
            throw $this->createException($e);
        }
    }

    public function changeCapacity($email, $capacity) {
        try {
            $this->getClient()->EmailChangeCapacity(explode('@', $email)[1], explode('@', $email)[0], $capacity);
        } catch (\SoapFault $e) {
            throw $this->createException($e);
        }
    }

    public function addRedirect(Redirect $redirect) {
        try {
            $this->getClient()->EmailCreateRedirect(explode('@', $redirect->getMailbox())[1], explode('@', $redirect->getMailbox())[0], $redirect->getDestination(), $redirect->isCopy());
        } catch (\SoapFault $e) {
            throw $this->createException($e);
        }
    }

    public function addMailbox(Mailbox $mailbox, $password) {
        try {
            $this->getClient()->EmailCreate(explode('@', $mailbox->getName())[1], explode('@', $mailbox->getName())[0], $password, $mailbox->getQuota());
        } catch (\SoapFault $e) {
            throw $this->createException($e);
        }
    }

    /**
     * @param $domain
     * @return array
     */
    public function doesDomainExists($domain) {
        try {
            $this->getClient()->EmailGetList($domain);
        } catch (\SoapFault $e) {
            if($e->faultcode === '100|004') {
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
