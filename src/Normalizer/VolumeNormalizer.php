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
    class VolumeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Docker\\API\\Model\\Volume';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Docker\\API\\Model\\Volume';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\Volume();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Name', $data) && $data['Name'] !== null) {
                $object->setName($data['Name']);
                unset($data['Name']);
            }
            elseif (\array_key_exists('Name', $data) && $data['Name'] === null) {
                $object->setName(null);
            }
            if (\array_key_exists('Driver', $data) && $data['Driver'] !== null) {
                $object->setDriver($data['Driver']);
                unset($data['Driver']);
            }
            elseif (\array_key_exists('Driver', $data) && $data['Driver'] === null) {
                $object->setDriver(null);
            }
            if (\array_key_exists('Mountpoint', $data) && $data['Mountpoint'] !== null) {
                $object->setMountpoint($data['Mountpoint']);
                unset($data['Mountpoint']);
            }
            elseif (\array_key_exists('Mountpoint', $data) && $data['Mountpoint'] === null) {
                $object->setMountpoint(null);
            }
            if (\array_key_exists('CreatedAt', $data) && $data['CreatedAt'] !== null) {
                $object->setCreatedAt($data['CreatedAt']);
                unset($data['CreatedAt']);
            }
            elseif (\array_key_exists('CreatedAt', $data) && $data['CreatedAt'] === null) {
                $object->setCreatedAt(null);
            }
            if (\array_key_exists('Status', $data) && $data['Status'] !== null) {
                $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Status'] as $key => $value) {
                    $values[$key] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\VolumeStatusItem', 'json', $context);
                }
                $object->setStatus($values);
                unset($data['Status']);
            }
            elseif (\array_key_exists('Status', $data) && $data['Status'] === null) {
                $object->setStatus(null);
            }
            if (\array_key_exists('Labels', $data) && $data['Labels'] !== null) {
                $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $object->setLabels($values_1);
                unset($data['Labels']);
            }
            elseif (\array_key_exists('Labels', $data) && $data['Labels'] === null) {
                $object->setLabels(null);
            }
            if (\array_key_exists('Scope', $data) && $data['Scope'] !== null) {
                $object->setScope($data['Scope']);
                unset($data['Scope']);
            }
            elseif (\array_key_exists('Scope', $data) && $data['Scope'] === null) {
                $object->setScope(null);
            }
            if (\array_key_exists('Options', $data) && $data['Options'] !== null) {
                $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Options'] as $key_2 => $value_2) {
                    $values_2[$key_2] = $value_2;
                }
                $object->setOptions($values_2);
                unset($data['Options']);
            }
            elseif (\array_key_exists('Options', $data) && $data['Options'] === null) {
                $object->setOptions(null);
            }
            if (\array_key_exists('UsageData', $data) && $data['UsageData'] !== null) {
                $object->setUsageData($this->denormalizer->denormalize($data['UsageData'], 'Docker\\API\\Model\\VolumeUsageData', 'json', $context));
                unset($data['UsageData']);
            }
            elseif (\array_key_exists('UsageData', $data) && $data['UsageData'] === null) {
                $object->setUsageData(null);
            }
            foreach ($data as $key_3 => $value_3) {
                if (preg_match('/.*/', (string) $key_3)) {
                    $object[$key_3] = $value_3;
                }
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['Name'] = $object->getName();
            $data['Driver'] = $object->getDriver();
            $data['Mountpoint'] = $object->getMountpoint();
            if ($object->isInitialized('createdAt') && null !== $object->getCreatedAt()) {
                $data['CreatedAt'] = $object->getCreatedAt();
            }
            if ($object->isInitialized('status') && null !== $object->getStatus()) {
                $values = [];
                foreach ($object->getStatus() as $key => $value) {
                    $values[$key] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Status'] = $values;
            }
            $values_1 = [];
            foreach ($object->getLabels() as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $data['Labels'] = $values_1;
            $data['Scope'] = $object->getScope();
            $values_2 = [];
            foreach ($object->getOptions() as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $data['Options'] = $values_2;
            if ($object->isInitialized('usageData') && null !== $object->getUsageData()) {
                $data['UsageData'] = $this->normalizer->normalize($object->getUsageData(), 'json', $context);
            }
            foreach ($object as $key_3 => $value_3) {
                if (preg_match('/.*/', (string) $key_3)) {
                    $data[$key_3] = $value_3;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Docker\\API\\Model\\Volume' => false];
        }
    }
} else {
    class VolumeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Docker\\API\\Model\\Volume';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Docker\\API\\Model\\Volume';
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
            $object = new \Docker\API\Model\Volume();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Name', $data) && $data['Name'] !== null) {
                $object->setName($data['Name']);
                unset($data['Name']);
            }
            elseif (\array_key_exists('Name', $data) && $data['Name'] === null) {
                $object->setName(null);
            }
            if (\array_key_exists('Driver', $data) && $data['Driver'] !== null) {
                $object->setDriver($data['Driver']);
                unset($data['Driver']);
            }
            elseif (\array_key_exists('Driver', $data) && $data['Driver'] === null) {
                $object->setDriver(null);
            }
            if (\array_key_exists('Mountpoint', $data) && $data['Mountpoint'] !== null) {
                $object->setMountpoint($data['Mountpoint']);
                unset($data['Mountpoint']);
            }
            elseif (\array_key_exists('Mountpoint', $data) && $data['Mountpoint'] === null) {
                $object->setMountpoint(null);
            }
            if (\array_key_exists('CreatedAt', $data) && $data['CreatedAt'] !== null) {
                $object->setCreatedAt($data['CreatedAt']);
                unset($data['CreatedAt']);
            }
            elseif (\array_key_exists('CreatedAt', $data) && $data['CreatedAt'] === null) {
                $object->setCreatedAt(null);
            }
            if (\array_key_exists('Status', $data) && $data['Status'] !== null) {
                $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Status'] as $key => $value) {
                    $values[$key] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\VolumeStatusItem', 'json', $context);
                }
                $object->setStatus($values);
                unset($data['Status']);
            }
            elseif (\array_key_exists('Status', $data) && $data['Status'] === null) {
                $object->setStatus(null);
            }
            if (\array_key_exists('Labels', $data) && $data['Labels'] !== null) {
                $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $object->setLabels($values_1);
                unset($data['Labels']);
            }
            elseif (\array_key_exists('Labels', $data) && $data['Labels'] === null) {
                $object->setLabels(null);
            }
            if (\array_key_exists('Scope', $data) && $data['Scope'] !== null) {
                $object->setScope($data['Scope']);
                unset($data['Scope']);
            }
            elseif (\array_key_exists('Scope', $data) && $data['Scope'] === null) {
                $object->setScope(null);
            }
            if (\array_key_exists('Options', $data) && $data['Options'] !== null) {
                $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Options'] as $key_2 => $value_2) {
                    $values_2[$key_2] = $value_2;
                }
                $object->setOptions($values_2);
                unset($data['Options']);
            }
            elseif (\array_key_exists('Options', $data) && $data['Options'] === null) {
                $object->setOptions(null);
            }
            if (\array_key_exists('UsageData', $data) && $data['UsageData'] !== null) {
                $object->setUsageData($this->denormalizer->denormalize($data['UsageData'], 'Docker\\API\\Model\\VolumeUsageData', 'json', $context));
                unset($data['UsageData']);
            }
            elseif (\array_key_exists('UsageData', $data) && $data['UsageData'] === null) {
                $object->setUsageData(null);
            }
            foreach ($data as $key_3 => $value_3) {
                if (preg_match('/.*/', (string) $key_3)) {
                    $object[$key_3] = $value_3;
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
            $data['Name'] = $object->getName();
            $data['Driver'] = $object->getDriver();
            $data['Mountpoint'] = $object->getMountpoint();
            if ($object->isInitialized('createdAt') && null !== $object->getCreatedAt()) {
                $data['CreatedAt'] = $object->getCreatedAt();
            }
            if ($object->isInitialized('status') && null !== $object->getStatus()) {
                $values = [];
                foreach ($object->getStatus() as $key => $value) {
                    $values[$key] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Status'] = $values;
            }
            $values_1 = [];
            foreach ($object->getLabels() as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $data['Labels'] = $values_1;
            $data['Scope'] = $object->getScope();
            $values_2 = [];
            foreach ($object->getOptions() as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $data['Options'] = $values_2;
            if ($object->isInitialized('usageData') && null !== $object->getUsageData()) {
                $data['UsageData'] = $this->normalizer->normalize($object->getUsageData(), 'json', $context);
            }
            foreach ($object as $key_3 => $value_3) {
                if (preg_match('/.*/', (string) $key_3)) {
                    $data[$key_3] = $value_3;
                }
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Docker\\API\\Model\\Volume' => false];
        }
    }
}