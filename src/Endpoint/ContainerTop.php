<?php

namespace Docker\API\Endpoint;

class ContainerTop extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    protected $id;
    protected $accept;
    /**
     * On Unix systems, this is done by running the `ps` command. This endpoint is not supported on Windows.
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     *     @var string $ps_args The arguments to pass to `ps`. For example, `aux`
     * }
     * @param array $accept Accept content header application/json|text/plain
     */
    public function __construct(string $id, array $queryParameters = [], array $accept = [])
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }
    use \Docker\API\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}/top');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }
    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['application/json', 'text/plain']];
        }
        return $this->accept;
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['ps_args']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['ps_args' => '-ef']);
        $optionsResolver->addAllowedTypes('ps_args', ['string']);
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Docker\API\Exception\ContainerTopNotFoundException
     * @throws \Docker\API\Exception\ContainerTopInternalServerErrorException
     *
     * @return null|\Docker\API\Model\ContainersIdTopGetJsonResponse200
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Docker\API\Model\ContainersIdTopGetJsonResponse200', 'json');
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Docker\API\Exception\ContainerTopNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Docker\API\Exception\ContainerTopInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return [];
    }
}