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
use Symfony\Component\HttpKernel\Kernel;
if (!class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class DistributionNameJsonGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Docker\\API\\Model\\DistributionNameJsonGetResponse200';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Docker\\API\\Model\\DistributionNameJsonGetResponse200';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\DistributionNameJsonGetResponse200();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Descriptor', $data) && $data['Descriptor'] !== null) {
                $object->setDescriptor($this->denormalizer->denormalize($data['Descriptor'], 'Docker\\API\\Model\\DistributionNameJsonGetResponse200Descriptor', 'json', $context));
                unset($data['Descriptor']);
            }
            elseif (\array_key_exists('Descriptor', $data) && $data['Descriptor'] === null) {
                $object->setDescriptor(null);
            }
            if (\array_key_exists('Platforms', $data) && $data['Platforms'] !== null) {
                $values = [];
                foreach ($data['Platforms'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\DistributionNameJsonGetResponse200PlatformsItem', 'json', $context);
                }
                $object->setPlatforms($values);
                unset($data['Platforms']);
            }
            elseif (\array_key_exists('Platforms', $data) && $data['Platforms'] === null) {
                $object->setPlatforms(null);
            }
            foreach ($data as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_1;
                }
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['Descriptor'] = $this->normalizer->normalize($object->getDescriptor(), 'json', $context);
            $values = [];
            foreach ($object->getPlatforms() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Platforms'] = $values;
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Docker\\API\\Model\\DistributionNameJsonGetResponse200' => false];
        }
    }
} else {
    class DistributionNameJsonGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Docker\\API\\Model\\DistributionNameJsonGetResponse200';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Docker\\API\\Model\\DistributionNameJsonGetResponse200';
        }
        /**
         * @return mixed
         */
        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\DistributionNameJsonGetResponse200();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Descriptor', $data) && $data['Descriptor'] !== null) {
                $object->setDescriptor($this->denormalizer->denormalize($data['Descriptor'], 'Docker\\API\\Model\\DistributionNameJsonGetResponse200Descriptor', 'json', $context));
                unset($data['Descriptor']);
            }
            elseif (\array_key_exists('Descriptor', $data) && $data['Descriptor'] === null) {
                $object->setDescriptor(null);
            }
            if (\array_key_exists('Platforms', $data) && $data['Platforms'] !== null) {
                $values = [];
                foreach ($data['Platforms'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\DistributionNameJsonGetResponse200PlatformsItem', 'json', $context);
                }
                $object->setPlatforms($values);
                unset($data['Platforms']);
            }
            elseif (\array_key_exists('Platforms', $data) && $data['Platforms'] === null) {
                $object->setPlatforms(null);
            }
            foreach ($data as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_1;
                }
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            $data['Descriptor'] = $this->normalizer->normalize($object->getDescriptor(), 'json', $context);
            $values = [];
            foreach ($object->getPlatforms() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Platforms'] = $values;
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Docker\\API\\Model\\DistributionNameJsonGetResponse200' => false];
        }
    }
}