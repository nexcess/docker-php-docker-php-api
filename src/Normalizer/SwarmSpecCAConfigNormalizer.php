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
    class SwarmSpecCAConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Docker\\API\\Model\\SwarmSpecCAConfig';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Docker\\API\\Model\\SwarmSpecCAConfig';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\SwarmSpecCAConfig();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('NodeCertExpiry', $data) && $data['NodeCertExpiry'] !== null) {
                $object->setNodeCertExpiry($data['NodeCertExpiry']);
                unset($data['NodeCertExpiry']);
            }
            elseif (\array_key_exists('NodeCertExpiry', $data) && $data['NodeCertExpiry'] === null) {
                $object->setNodeCertExpiry(null);
            }
            if (\array_key_exists('ExternalCAs', $data) && $data['ExternalCAs'] !== null) {
                $values = [];
                foreach ($data['ExternalCAs'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\SwarmSpecCAConfigExternalCAsItem', 'json', $context);
                }
                $object->setExternalCAs($values);
                unset($data['ExternalCAs']);
            }
            elseif (\array_key_exists('ExternalCAs', $data) && $data['ExternalCAs'] === null) {
                $object->setExternalCAs(null);
            }
            if (\array_key_exists('SigningCACert', $data) && $data['SigningCACert'] !== null) {
                $object->setSigningCACert($data['SigningCACert']);
                unset($data['SigningCACert']);
            }
            elseif (\array_key_exists('SigningCACert', $data) && $data['SigningCACert'] === null) {
                $object->setSigningCACert(null);
            }
            if (\array_key_exists('SigningCAKey', $data) && $data['SigningCAKey'] !== null) {
                $object->setSigningCAKey($data['SigningCAKey']);
                unset($data['SigningCAKey']);
            }
            elseif (\array_key_exists('SigningCAKey', $data) && $data['SigningCAKey'] === null) {
                $object->setSigningCAKey(null);
            }
            if (\array_key_exists('ForceRotate', $data) && $data['ForceRotate'] !== null) {
                $object->setForceRotate($data['ForceRotate']);
                unset($data['ForceRotate']);
            }
            elseif (\array_key_exists('ForceRotate', $data) && $data['ForceRotate'] === null) {
                $object->setForceRotate(null);
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
            if ($object->isInitialized('nodeCertExpiry') && null !== $object->getNodeCertExpiry()) {
                $data['NodeCertExpiry'] = $object->getNodeCertExpiry();
            }
            if ($object->isInitialized('externalCAs') && null !== $object->getExternalCAs()) {
                $values = [];
                foreach ($object->getExternalCAs() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['ExternalCAs'] = $values;
            }
            if ($object->isInitialized('signingCACert') && null !== $object->getSigningCACert()) {
                $data['SigningCACert'] = $object->getSigningCACert();
            }
            if ($object->isInitialized('signingCAKey') && null !== $object->getSigningCAKey()) {
                $data['SigningCAKey'] = $object->getSigningCAKey();
            }
            if ($object->isInitialized('forceRotate') && null !== $object->getForceRotate()) {
                $data['ForceRotate'] = $object->getForceRotate();
            }
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Docker\\API\\Model\\SwarmSpecCAConfig' => false];
        }
    }
} else {
    class SwarmSpecCAConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Docker\\API\\Model\\SwarmSpecCAConfig';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Docker\\API\\Model\\SwarmSpecCAConfig';
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
            $object = new \Docker\API\Model\SwarmSpecCAConfig();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('NodeCertExpiry', $data) && $data['NodeCertExpiry'] !== null) {
                $object->setNodeCertExpiry($data['NodeCertExpiry']);
                unset($data['NodeCertExpiry']);
            }
            elseif (\array_key_exists('NodeCertExpiry', $data) && $data['NodeCertExpiry'] === null) {
                $object->setNodeCertExpiry(null);
            }
            if (\array_key_exists('ExternalCAs', $data) && $data['ExternalCAs'] !== null) {
                $values = [];
                foreach ($data['ExternalCAs'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\SwarmSpecCAConfigExternalCAsItem', 'json', $context);
                }
                $object->setExternalCAs($values);
                unset($data['ExternalCAs']);
            }
            elseif (\array_key_exists('ExternalCAs', $data) && $data['ExternalCAs'] === null) {
                $object->setExternalCAs(null);
            }
            if (\array_key_exists('SigningCACert', $data) && $data['SigningCACert'] !== null) {
                $object->setSigningCACert($data['SigningCACert']);
                unset($data['SigningCACert']);
            }
            elseif (\array_key_exists('SigningCACert', $data) && $data['SigningCACert'] === null) {
                $object->setSigningCACert(null);
            }
            if (\array_key_exists('SigningCAKey', $data) && $data['SigningCAKey'] !== null) {
                $object->setSigningCAKey($data['SigningCAKey']);
                unset($data['SigningCAKey']);
            }
            elseif (\array_key_exists('SigningCAKey', $data) && $data['SigningCAKey'] === null) {
                $object->setSigningCAKey(null);
            }
            if (\array_key_exists('ForceRotate', $data) && $data['ForceRotate'] !== null) {
                $object->setForceRotate($data['ForceRotate']);
                unset($data['ForceRotate']);
            }
            elseif (\array_key_exists('ForceRotate', $data) && $data['ForceRotate'] === null) {
                $object->setForceRotate(null);
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
            if ($object->isInitialized('nodeCertExpiry') && null !== $object->getNodeCertExpiry()) {
                $data['NodeCertExpiry'] = $object->getNodeCertExpiry();
            }
            if ($object->isInitialized('externalCAs') && null !== $object->getExternalCAs()) {
                $values = [];
                foreach ($object->getExternalCAs() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['ExternalCAs'] = $values;
            }
            if ($object->isInitialized('signingCACert') && null !== $object->getSigningCACert()) {
                $data['SigningCACert'] = $object->getSigningCACert();
            }
            if ($object->isInitialized('signingCAKey') && null !== $object->getSigningCAKey()) {
                $data['SigningCAKey'] = $object->getSigningCAKey();
            }
            if ($object->isInitialized('forceRotate') && null !== $object->getForceRotate()) {
                $data['ForceRotate'] = $object->getForceRotate();
            }
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Docker\\API\\Model\\SwarmSpecCAConfig' => false];
        }
    }
}