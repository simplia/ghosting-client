<?php
namespace Soukicz\GhostingClient\Entity\Domain;

class Mailbox {
    /**
     * @var string
     */
    protected $name;
    /**
     * @var float
     */
    protected $quota, $size;
    /**
     * @var int
     */
    protected $messages, $messagesQuota;

    /**
     * @var string
     */
    protected $webmailServer, $smtpServer, $imapServer, $pop3Server;

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Mailbox
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuota() {
        return $this->quota;
    }

    /**
     * @param float $quota
     * @return Mailbox
     */
    public function setQuota($quota) {
        $this->quota = $quota;
        return $this;
    }

    /**
     * @return float
     */
    public function getSize() {
        return $this->size;
    }

    /**
     * @param float $size
     * @return Mailbox
     */
    public function setSize($size) {
        $this->size = $size;
        return $this;
    }

    /**
     * @return int
     */
    public function getMessages() {
        return $this->messages;
    }

    /**
     * @param int $messages
     * @return Mailbox
     */
    public function setMessages($messages) {
        $this->messages = $messages;
        return $this;
    }

    /**
     * @return int
     */
    public function getMessagesQuota() {
        return $this->messagesQuota;
    }

    /**
     * @param int $messagesQuota
     * @return Mailbox
     */
    public function setMessagesQuota($messagesQuota) {
        $this->messagesQuota = $messagesQuota;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebmailServer() {
        return $this->webmailServer;
    }

    /**
     * @param string $webmailServer
     * @return Mailbox
     */
    public function setWebmailServer($webmailServer) {
        $this->webmailServer = $webmailServer;
        return $this;
    }

    /**
     * @return string
     */
    public function getSmtpServer() {
        return $this->smtpServer;
    }

    /**
     * @param string $smtpServer
     * @return Mailbox
     */
    public function setSmtpServer($smtpServer) {
        $this->smtpServer = $smtpServer;
        return $this;
    }

    /**
     * @return string
     */
    public function getImapServer() {
        return $this->imapServer;
    }

    /**
     * @param string $imapServer
     * @return Mailbox
     */
    public function setImapServer($imapServer) {
        $this->imapServer = $imapServer;
        return $this;
    }

    /**
     * @return string
     */
    public function getPop3Server() {
        return $this->pop3Server;
    }

    /**
     * @param string $pop3Server
     * @return Mailbox
     */
    public function setPop3Server($pop3Server) {
        $this->pop3Server = $pop3Server;
        return $this;
    }


}
