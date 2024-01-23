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
class GenericResourcesItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return $type === 'Docker\API\Model\GenericResourcesItem';
    }
    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === 'Docker\API\Model\GenericResourcesItem';
    }
    /**
     * @return mixed
     */
    public function denormalize(mixed $data, string $class, string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\GenericResourcesItem();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('NamedResourceSpec', $data) && $data['NamedResourceSpec'] !== null) {
            $object->setNamedResourceSpec($this->denormalizer->denormalize($data['NamedResourceSpec'], 'Docker\API\Model\GenericResourcesItemNamedResourceSpec', 'json', $context));
            unset($data['NamedResourceSpec']);
        }
        elseif (\array_key_exists('NamedResourceSpec', $data) && $data['NamedResourceSpec'] === null) {
            $object->setNamedResourceSpec(null);
        }
        if (\array_key_exists('DiscreteResourceSpec', $data) && $data['DiscreteResourceSpec'] !== null) {
            $object->setDiscreteResourceSpec($this->denormalizer->denormalize($data['DiscreteResourceSpec'], 'Docker\API\Model\GenericResourcesItemDiscreteResourceSpec', 'json', $context));
            unset($data['DiscreteResourceSpec']);
        }
        elseif (\array_key_exists('DiscreteResourceSpec', $data) && $data['DiscreteResourceSpec'] === null) {
            $object->setDiscreteResourceSpec(null);
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
    public function normalize(mixed $object, string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $data = [];
        if ($object->isInitialized('namedResourceSpec') && null !== $object->getNamedResourceSpec()) {
            $data['NamedResourceSpec'] = ($object->getNamedResourceSpec() == null) ? null : new \ArrayObject($this->normalizer->normalize($object->getNamedResourceSpec(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        if ($object->isInitialized('discreteResourceSpec') && null !== $object->getDiscreteResourceSpec()) {
            $data['DiscreteResourceSpec'] = ($object->getDiscreteResourceSpec() == null) ? null : new \ArrayObject($this->normalizer->normalize($object->getDiscreteResourceSpec(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return ['Docker\API\Model\GenericResourcesItem' => false];
    }
}