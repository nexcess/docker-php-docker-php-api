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
class SystemDfGetTextplainResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Docker\\API\\Model\\SystemDfGetTextplainResponse200';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\SystemDfGetTextplainResponse200';
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
        $object = new \Docker\API\Model\SystemDfGetTextplainResponse200();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('LayersSize', $data) && $data['LayersSize'] !== null) {
            $object->setLayersSize($data['LayersSize']);
            unset($data['LayersSize']);
        }
        elseif (\array_key_exists('LayersSize', $data) && $data['LayersSize'] === null) {
            $object->setLayersSize(null);
        }
        if (\array_key_exists('Images', $data) && $data['Images'] !== null) {
            $values = array();
            foreach ($data['Images'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\ImageSummary', 'json', $context);
            }
            $object->setImages($values);
            unset($data['Images']);
        }
        elseif (\array_key_exists('Images', $data) && $data['Images'] === null) {
            $object->setImages(null);
        }
        if (\array_key_exists('Containers', $data) && $data['Containers'] !== null) {
            $values_1 = array();
            foreach ($data['Containers'] as $value_1) {
                $values_2 = array();
                foreach ($value_1 as $value_2) {
                    $values_2[] = $this->denormalizer->denormalize($value_2, 'Docker\\API\\Model\\ContainerSummaryItem', 'json', $context);
                }
                $values_1[] = $values_2;
            }
            $object->setContainers($values_1);
            unset($data['Containers']);
        }
        elseif (\array_key_exists('Containers', $data) && $data['Containers'] === null) {
            $object->setContainers(null);
        }
        if (\array_key_exists('Volumes', $data) && $data['Volumes'] !== null) {
            $values_3 = array();
            foreach ($data['Volumes'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'Docker\\API\\Model\\Volume', 'json', $context);
            }
            $object->setVolumes($values_3);
            unset($data['Volumes']);
        }
        elseif (\array_key_exists('Volumes', $data) && $data['Volumes'] === null) {
            $object->setVolumes(null);
        }
        foreach ($data as $key => $value_4) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_4;
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
        if ($object->isInitialized('layersSize') && null !== $object->getLayersSize()) {
            $data['LayersSize'] = $object->getLayersSize();
        }
        if ($object->isInitialized('images') && null !== $object->getImages()) {
            $values = array();
            foreach ($object->getImages() as $value) {
                $values[] = $value == null ? null : new \ArrayObject($this->normalizer->normalize($value, 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
            }
            $data['Images'] = $values;
        }
        if ($object->isInitialized('containers') && null !== $object->getContainers()) {
            $values_1 = array();
            foreach ($object->getContainers() as $value_1) {
                $values_2 = array();
                foreach ($value_1 as $value_2) {
                    $values_2[] = $value_2 == null ? null : new \ArrayObject($this->normalizer->normalize($value_2, 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
                }
                $values_1[] = $values_2;
            }
            $data['Containers'] = $values_1;
        }
        if ($object->isInitialized('volumes') && null !== $object->getVolumes()) {
            $values_3 = array();
            foreach ($object->getVolumes() as $value_3) {
                $values_3[] = $value_3 == null ? null : new \ArrayObject($this->normalizer->normalize($value_3, 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
            }
            $data['Volumes'] = $values_3;
        }
        foreach ($object as $key => $value_4) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_4;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('Docker\\API\\Model\\SystemDfGetTextplainResponse200' => false);
    }
}