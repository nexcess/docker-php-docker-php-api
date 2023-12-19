<?php

namespace Docker\API\Model;

class ServiceUpdateResponse extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * Optional warning messages
     *
     * @var string[]|null
     */
    protected $warnings;
    /**
     * Optional warning messages
     *
     * @return string[]|null
     */
    public function getWarnings() : ?array
    {
        return $this->warnings;
    }
    /**
     * Optional warning messages
     *
     * @param string[]|null $warnings
     *
     * @return self
     */
    public function setWarnings(?array $warnings) : self
    {
        $this->initialized['warnings'] = true;
        $this->warnings = $warnings;
        return $this;
    }
}