<?php

namespace Application\Model;

/**
 * Country data entity
 */
class Country
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $iso2;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Country
     */
    public function setName(string $name): Country
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getIso2(): string
    {
        return $this->iso2;
    }

    /**
     * @param string $iso2
     * @return Country
     */
    public function setIso2(string $iso2): Country
    {
        $this->iso2 = $iso2;
        return $this;
    }
}
