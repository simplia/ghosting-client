<?php
namespace Soukicz\GhostingClient\Entity\Domain;

class Redirect {
    /**
     * @var string
     */
    protected $mailbox, $destination;

    /**
     * @var bool
     */
    protected $copy;

    /**
     * @return string
     */
    public function getMailbox() {
        return $this->mailbox;
    }

    /**
     * @param string $mailbox
     * @return Redirect
     */
    public function setMailbox($mailbox) {
        $this->mailbox = $mailbox;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestination() {
        return $this->destination;
    }

    /**
     * @param string $destination
     * @return Redirect
     */
    public function setDestination($destination) {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCopy() {
        return $this->copy;
    }

    /**
     * @param boolean $copy
     * @return Redirect
     */
    public function setCopy($copy) {
        $this->copy = $copy;
        return $this;
    }


}
