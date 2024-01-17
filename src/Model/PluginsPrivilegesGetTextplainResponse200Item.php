<?php

namespace Docker\API\Model;

class PluginsPrivilegesGetTextplainResponse200Item extends \ArrayObject
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
     *
     *
     * @var string|null
     */
    protected $name;
    /**
     *
     *
     * @var string|null
     */
    protected $description;
    /**
     *
     *
     * @var string[]|null
     */
    protected $value;
    /**
     *
     *
     * @return string|null
     */
    public function getName() : ?string
    {
        return $this->name;
    }
    /**
     *
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name) : self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     *
     *
     * @return string|null
     */
    public function getDescription() : ?string
    {
        return $this->description;
    }
    /**
     *
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description) : self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     *
     *
     * @return string[]|null
     */
    public function getValue() : ?array
    {
        return $this->value;
    }
    /**
     *
     *
     * @param string[]|null $value
     *
     * @return self
     */
    public function setValue(?array $value) : self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
}
