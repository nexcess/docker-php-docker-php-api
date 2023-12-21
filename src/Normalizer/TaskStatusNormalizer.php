<?php

namespace Docker\API\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class TaskStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Docker\\API\\Model\\TaskStatus';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\TaskStatus';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskStatus();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Timestamp', $data) && $data['Timestamp'] !== null) {
            $object->setTimestamp($data['Timestamp']);
            unset($data['Timestamp']);
        }
        elseif (\array_key_exists('Timestamp', $data) && $data['Timestamp'] === null) {
            $object->setTimestamp(null);
        }
        if (\array_key_exists('State', $data) && $data['State'] !== null) {
            $object->setState($data['State']);
            unset($data['State']);
        }
        elseif (\array_key_exists('State', $data) && $data['State'] === null) {
            $object->setState(null);
        }
        if (\array_key_exists('Message', $data) && $data['Message'] !== null) {
            $object->setMessage($data['Message']);
            unset($data['Message']);
        }
        elseif (\array_key_exists('Message', $data) && $data['Message'] === null) {
            $object->setMessage(null);
        }
        if (\array_key_exists('Err', $data) && $data['Err'] !== null) {
            $object->setErr($data['Err']);
            unset($data['Err']);
        }
        elseif (\array_key_exists('Err', $data) && $data['Err'] === null) {
            $object->setErr(null);
        }
        if (\array_key_exists('ContainerStatus', $data) && $data['ContainerStatus'] !== null) {
            $object->setContainerStatus($this->denormalizer->denormalize($data['ContainerStatus'], 'Docker\\API\\Model\\TaskStatusContainerStatus', 'json', $context));
            unset($data['ContainerStatus']);
        }
        elseif (\array_key_exists('ContainerStatus', $data) && $data['ContainerStatus'] === null) {
            $object->setContainerStatus(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('timestamp') && null !== $object->getTimestamp()) {
            $data['Timestamp'] = $object->getTimestamp();
        }
        if ($object->isInitialized('state') && null !== $object->getState()) {
            $data['State'] = $object->getState();
        }
        if ($object->isInitialized('message') && null !== $object->getMessage()) {
            $data['Message'] = $object->getMessage();
        }
        if ($object->isInitialized('err') && null !== $object->getErr()) {
            $data['Err'] = $object->getErr();
        }
        if ($object->isInitialized('containerStatus') && null !== $object->getContainerStatus()) {
            $data['ContainerStatus'] = $object->getContainerStatus() == null ? null : new \ArrayObject($this->normalizer->normalize($object->getContainerStatus(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('Docker\\API\\Model\\TaskStatus' => false);
    }
}