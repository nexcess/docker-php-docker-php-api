<?php

namespace Docker\API\Model;

class SecretsCreatePostBody extends \ArrayObject
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
     * User-defined name of the secret.
     *
     * @var string|null
     */
    protected $name;
    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>|null
     */
    protected $labels;
    /**
    * Base64-url-safe-encoded ([RFC 4648](https://tools.ietf.org/html/rfc4648#section-3.2))
    data to store as secret.

    This field is only used to _create_ a secret, and is not returned by
    other endpoints.

    *
    * @var string|null
    */
    protected $data;
    /**
     * Driver represents a driver (network, logging, secrets).
     *
     * @var Driver|null
     */
    protected $driver;
    /**
     * User-defined name of the secret.
     *
     * @return string|null
     */
    public function getName() : ?string
    {
        return $this->name;
    }
    /**
     * User-defined name of the secret.
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
     * User-defined key/value metadata.
     *
     * @return array<string, string>|null
     */
    public function getLabels() : ?\ArrayObject
    {
        return $this->labels;
    }
    /**
     * User-defined key/value metadata.
     *
     * @param array<string, string>|null $labels
     *
     * @return self
     */
    public function setLabels(?\ArrayObject $labels) : self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;
        return $this;
    }
    /**
    * Base64-url-safe-encoded ([RFC 4648](https://tools.ietf.org/html/rfc4648#section-3.2))
    data to store as secret.

    This field is only used to _create_ a secret, and is not returned by
    other endpoints.

    *
    * @return string|null
    */
    public function getData() : ?string
    {
        return $this->data;
    }
    /**
    * Base64-url-safe-encoded ([RFC 4648](https://tools.ietf.org/html/rfc4648#section-3.2))
    data to store as secret.

    This field is only used to _create_ a secret, and is not returned by
    other endpoints.

    *
    * @param string|null $data
    *
    * @return self
    */
    public function setData(?string $data) : self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
    /**
     * Driver represents a driver (network, logging, secrets).
     *
     * @return Driver|null
     */
    public function getDriver() : ?Driver
    {
        return $this->driver;
    }
    /**
     * Driver represents a driver (network, logging, secrets).
     *
     * @param Driver|null $driver
     *
     * @return self
     */
    public function setDriver(?Driver $driver) : self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;
        return $this;
    }
}
