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
    class DistributionNameJsonGetResponse200PlatformsItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === \Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === \Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem::class;
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Architecture', $data) && $data['Architecture'] !== null) {
                $object->setArchitecture($data['Architecture']);
                unset($data['Architecture']);
            }
            elseif (\array_key_exists('Architecture', $data) && $data['Architecture'] === null) {
                $object->setArchitecture(null);
            }
            if (\array_key_exists('OS', $data) && $data['OS'] !== null) {
                $object->setOS($data['OS']);
                unset($data['OS']);
            }
            elseif (\array_key_exists('OS', $data) && $data['OS'] === null) {
                $object->setOS(null);
            }
            if (\array_key_exists('OSVersion', $data) && $data['OSVersion'] !== null) {
                $object->setOSVersion($data['OSVersion']);
                unset($data['OSVersion']);
            }
            elseif (\array_key_exists('OSVersion', $data) && $data['OSVersion'] === null) {
                $object->setOSVersion(null);
            }
            if (\array_key_exists('OSFeatures', $data) && $data['OSFeatures'] !== null) {
                $values = [];
                foreach ($data['OSFeatures'] as $value) {
                    $values[] = $value;
                }
                $object->setOSFeatures($values);
                unset($data['OSFeatures']);
            }
            elseif (\array_key_exists('OSFeatures', $data) && $data['OSFeatures'] === null) {
                $object->setOSFeatures(null);
            }
            if (\array_key_exists('Variant', $data) && $data['Variant'] !== null) {
                $object->setVariant($data['Variant']);
                unset($data['Variant']);
            }
            elseif (\array_key_exists('Variant', $data) && $data['Variant'] === null) {
                $object->setVariant(null);
            }
            if (\array_key_exists('Features', $data) && $data['Features'] !== null) {
                $values_1 = [];
                foreach ($data['Features'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setFeatures($values_1);
                unset($data['Features']);
            }
            elseif (\array_key_exists('Features', $data) && $data['Features'] === null) {
                $object->setFeatures(null);
            }
            foreach ($data as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_2;
                }
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('architecture') && null !== $object->getArchitecture()) {
                $data['Architecture'] = $object->getArchitecture();
            }
            if ($object->isInitialized('oS') && null !== $object->getOS()) {
                $data['OS'] = $object->getOS();
            }
            if ($object->isInitialized('oSVersion') && null !== $object->getOSVersion()) {
                $data['OSVersion'] = $object->getOSVersion();
            }
            if ($object->isInitialized('oSFeatures') && null !== $object->getOSFeatures()) {
                $values = [];
                foreach ($object->getOSFeatures() as $value) {
                    $values[] = $value;
                }
                $data['OSFeatures'] = $values;
            }
            if ($object->isInitialized('variant') && null !== $object->getVariant()) {
                $data['Variant'] = $object->getVariant();
            }
            if ($object->isInitialized('features') && null !== $object->getFeatures()) {
                $values_1 = [];
                foreach ($object->getFeatures() as $value_1) {
                    $values_1[] = $value_1;
                }
                $data['Features'] = $values_1;
            }
            foreach ($object as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_2;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return [\Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem::class => false];
        }
    }
} else {
    class DistributionNameJsonGetResponse200PlatformsItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === \Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem::class;
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === \Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem::class;
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
            $object = new \Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Architecture', $data) && $data['Architecture'] !== null) {
                $object->setArchitecture($data['Architecture']);
                unset($data['Architecture']);
            }
            elseif (\array_key_exists('Architecture', $data) && $data['Architecture'] === null) {
                $object->setArchitecture(null);
            }
            if (\array_key_exists('OS', $data) && $data['OS'] !== null) {
                $object->setOS($data['OS']);
                unset($data['OS']);
            }
            elseif (\array_key_exists('OS', $data) && $data['OS'] === null) {
                $object->setOS(null);
            }
            if (\array_key_exists('OSVersion', $data) && $data['OSVersion'] !== null) {
                $object->setOSVersion($data['OSVersion']);
                unset($data['OSVersion']);
            }
            elseif (\array_key_exists('OSVersion', $data) && $data['OSVersion'] === null) {
                $object->setOSVersion(null);
            }
            if (\array_key_exists('OSFeatures', $data) && $data['OSFeatures'] !== null) {
                $values = [];
                foreach ($data['OSFeatures'] as $value) {
                    $values[] = $value;
                }
                $object->setOSFeatures($values);
                unset($data['OSFeatures']);
            }
            elseif (\array_key_exists('OSFeatures', $data) && $data['OSFeatures'] === null) {
                $object->setOSFeatures(null);
            }
            if (\array_key_exists('Variant', $data) && $data['Variant'] !== null) {
                $object->setVariant($data['Variant']);
                unset($data['Variant']);
            }
            elseif (\array_key_exists('Variant', $data) && $data['Variant'] === null) {
                $object->setVariant(null);
            }
            if (\array_key_exists('Features', $data) && $data['Features'] !== null) {
                $values_1 = [];
                foreach ($data['Features'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setFeatures($values_1);
                unset($data['Features']);
            }
            elseif (\array_key_exists('Features', $data) && $data['Features'] === null) {
                $object->setFeatures(null);
            }
            foreach ($data as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_2;
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
            if ($object->isInitialized('architecture') && null !== $object->getArchitecture()) {
                $data['Architecture'] = $object->getArchitecture();
            }
            if ($object->isInitialized('oS') && null !== $object->getOS()) {
                $data['OS'] = $object->getOS();
            }
            if ($object->isInitialized('oSVersion') && null !== $object->getOSVersion()) {
                $data['OSVersion'] = $object->getOSVersion();
            }
            if ($object->isInitialized('oSFeatures') && null !== $object->getOSFeatures()) {
                $values = [];
                foreach ($object->getOSFeatures() as $value) {
                    $values[] = $value;
                }
                $data['OSFeatures'] = $values;
            }
            if ($object->isInitialized('variant') && null !== $object->getVariant()) {
                $data['Variant'] = $object->getVariant();
            }
            if ($object->isInitialized('features') && null !== $object->getFeatures()) {
                $values_1 = [];
                foreach ($object->getFeatures() as $value_1) {
                    $values_1[] = $value_1;
                }
                $data['Features'] = $values_1;
            }
            foreach ($object as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_2;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return [\Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem::class => false];
        }
    }
}