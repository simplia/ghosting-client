<?php
namespace Soukicz\GhostingClient\Entity;

class Domain {
    protected $name;

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Domain
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

}
