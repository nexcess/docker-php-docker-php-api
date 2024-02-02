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
    class ProcessConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Docker\\API\\Model\\ProcessConfig';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Docker\\API\\Model\\ProcessConfig';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\ProcessConfig();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('privileged', $data) && $data['privileged'] !== null) {
                $object->setPrivileged($data['privileged']);
                unset($data['privileged']);
            }
            elseif (\array_key_exists('privileged', $data) && $data['privileged'] === null) {
                $object->setPrivileged(null);
            }
            if (\array_key_exists('user', $data) && $data['user'] !== null) {
                $object->setUser($data['user']);
                unset($data['user']);
            }
            elseif (\array_key_exists('user', $data) && $data['user'] === null) {
                $object->setUser(null);
            }
            if (\array_key_exists('tty', $data) && $data['tty'] !== null) {
                $object->setTty($data['tty']);
                unset($data['tty']);
            }
            elseif (\array_key_exists('tty', $data) && $data['tty'] === null) {
                $object->setTty(null);
            }
            if (\array_key_exists('entrypoint', $data) && $data['entrypoint'] !== null) {
                $object->setEntrypoint($data['entrypoint']);
                unset($data['entrypoint']);
            }
            elseif (\array_key_exists('entrypoint', $data) && $data['entrypoint'] === null) {
                $object->setEntrypoint(null);
            }
            if (\array_key_exists('arguments', $data) && $data['arguments'] !== null) {
                $values = [];
                foreach ($data['arguments'] as $value) {
                    $values[] = $value;
                }
                $object->setArguments($values);
                unset($data['arguments']);
            }
            elseif (\array_key_exists('arguments', $data) && $data['arguments'] === null) {
                $object->setArguments(null);
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
            if ($object->isInitialized('privileged') && null !== $object->getPrivileged()) {
                $data['privileged'] = $object->getPrivileged();
            }
            if ($object->isInitialized('user') && null !== $object->getUser()) {
                $data['user'] = $object->getUser();
            }
            if ($object->isInitialized('tty') && null !== $object->getTty()) {
                $data['tty'] = $object->getTty();
            }
            if ($object->isInitialized('entrypoint') && null !== $object->getEntrypoint()) {
                $data['entrypoint'] = $object->getEntrypoint();
            }
            if ($object->isInitialized('arguments') && null !== $object->getArguments()) {
                $values = [];
                foreach ($object->getArguments() as $value) {
                    $values[] = $value;
                }
                $data['arguments'] = $values;
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
            return ['Docker\\API\\Model\\ProcessConfig' => false];
        }
    }
} else {
    class ProcessConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Docker\\API\\Model\\ProcessConfig';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Docker\\API\\Model\\ProcessConfig';
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
            $object = new \Docker\API\Model\ProcessConfig();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('privileged', $data) && $data['privileged'] !== null) {
                $object->setPrivileged($data['privileged']);
                unset($data['privileged']);
            }
            elseif (\array_key_exists('privileged', $data) && $data['privileged'] === null) {
                $object->setPrivileged(null);
            }
            if (\array_key_exists('user', $data) && $data['user'] !== null) {
                $object->setUser($data['user']);
                unset($data['user']);
            }
            elseif (\array_key_exists('user', $data) && $data['user'] === null) {
                $object->setUser(null);
            }
            if (\array_key_exists('tty', $data) && $data['tty'] !== null) {
                $object->setTty($data['tty']);
                unset($data['tty']);
            }
            elseif (\array_key_exists('tty', $data) && $data['tty'] === null) {
                $object->setTty(null);
            }
            if (\array_key_exists('entrypoint', $data) && $data['entrypoint'] !== null) {
                $object->setEntrypoint($data['entrypoint']);
                unset($data['entrypoint']);
            }
            elseif (\array_key_exists('entrypoint', $data) && $data['entrypoint'] === null) {
                $object->setEntrypoint(null);
            }
            if (\array_key_exists('arguments', $data) && $data['arguments'] !== null) {
                $values = [];
                foreach ($data['arguments'] as $value) {
                    $values[] = $value;
                }
                $object->setArguments($values);
                unset($data['arguments']);
            }
            elseif (\array_key_exists('arguments', $data) && $data['arguments'] === null) {
                $object->setArguments(null);
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
            if ($object->isInitialized('privileged') && null !== $object->getPrivileged()) {
                $data['privileged'] = $object->getPrivileged();
            }
            if ($object->isInitialized('user') && null !== $object->getUser()) {
                $data['user'] = $object->getUser();
            }
            if ($object->isInitialized('tty') && null !== $object->getTty()) {
                $data['tty'] = $object->getTty();
            }
            if ($object->isInitialized('entrypoint') && null !== $object->getEntrypoint()) {
                $data['entrypoint'] = $object->getEntrypoint();
            }
            if ($object->isInitialized('arguments') && null !== $object->getArguments()) {
                $values = [];
                foreach ($object->getArguments() as $value) {
                    $values[] = $value;
                }
                $data['arguments'] = $values;
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
            return ['Docker\\API\\Model\\ProcessConfig' => false];
        }
    }
}