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
    class PortNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Docker\\API\\Model\\Port';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Docker\\API\\Model\\Port';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\Port();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('IP', $data) && $data['IP'] !== null) {
                $object->setIP($data['IP']);
                unset($data['IP']);
            }
            elseif (\array_key_exists('IP', $data) && $data['IP'] === null) {
                $object->setIP(null);
            }
            if (\array_key_exists('PrivatePort', $data) && $data['PrivatePort'] !== null) {
                $object->setPrivatePort($data['PrivatePort']);
                unset($data['PrivatePort']);
            }
            elseif (\array_key_exists('PrivatePort', $data) && $data['PrivatePort'] === null) {
                $object->setPrivatePort(null);
            }
            if (\array_key_exists('PublicPort', $data) && $data['PublicPort'] !== null) {
                $object->setPublicPort($data['PublicPort']);
                unset($data['PublicPort']);
            }
            elseif (\array_key_exists('PublicPort', $data) && $data['PublicPort'] === null) {
                $object->setPublicPort(null);
            }
            if (\array_key_exists('Type', $data) && $data['Type'] !== null) {
                $object->setType($data['Type']);
                unset($data['Type']);
            }
            elseif (\array_key_exists('Type', $data) && $data['Type'] === null) {
                $object->setType(null);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('iP') && null !== $object->getIP()) {
                $data['IP'] = $object->getIP();
            }
            $data['PrivatePort'] = $object->getPrivatePort();
            if ($object->isInitialized('publicPort') && null !== $object->getPublicPort()) {
                $data['PublicPort'] = $object->getPublicPort();
            }
            $data['Type'] = $object->getType();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Docker\\API\\Model\\Port' => false];
        }
    }
} else {
    class PortNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Docker\\API\\Model\\Port';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Docker\\API\\Model\\Port';
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
            $object = new \Docker\API\Model\Port();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('IP', $data) && $data['IP'] !== null) {
                $object->setIP($data['IP']);
                unset($data['IP']);
            }
            elseif (\array_key_exists('IP', $data) && $data['IP'] === null) {
                $object->setIP(null);
            }
            if (\array_key_exists('PrivatePort', $data) && $data['PrivatePort'] !== null) {
                $object->setPrivatePort($data['PrivatePort']);
                unset($data['PrivatePort']);
            }
            elseif (\array_key_exists('PrivatePort', $data) && $data['PrivatePort'] === null) {
                $object->setPrivatePort(null);
            }
            if (\array_key_exists('PublicPort', $data) && $data['PublicPort'] !== null) {
                $object->setPublicPort($data['PublicPort']);
                unset($data['PublicPort']);
            }
            elseif (\array_key_exists('PublicPort', $data) && $data['PublicPort'] === null) {
                $object->setPublicPort(null);
            }
            if (\array_key_exists('Type', $data) && $data['Type'] !== null) {
                $object->setType($data['Type']);
                unset($data['Type']);
            }
            elseif (\array_key_exists('Type', $data) && $data['Type'] === null) {
                $object->setType(null);
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
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('iP') && null !== $object->getIP()) {
                $data['IP'] = $object->getIP();
            }
            $data['PrivatePort'] = $object->getPrivatePort();
            if ($object->isInitialized('publicPort') && null !== $object->getPublicPort()) {
                $data['PublicPort'] = $object->getPublicPort();
            }
            $data['Type'] = $object->getType();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Docker\\API\\Model\\Port' => false];
        }
    }
}