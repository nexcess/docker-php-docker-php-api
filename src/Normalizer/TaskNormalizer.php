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
class TaskNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Docker\\API\\Model\\Task';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\Task';
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
        $object = new \Docker\API\Model\Task();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('ID', $data) && $data['ID'] !== null) {
            $object->setID($data['ID']);
            unset($data['ID']);
        }
        elseif (\array_key_exists('ID', $data) && $data['ID'] === null) {
            $object->setID(null);
        }
        if (\array_key_exists('Version', $data) && $data['Version'] !== null) {
            $object->setVersion($this->denormalizer->denormalize($data['Version'], 'Docker\\API\\Model\\ObjectVersion', 'json', $context));
            unset($data['Version']);
        }
        elseif (\array_key_exists('Version', $data) && $data['Version'] === null) {
            $object->setVersion(null);
        }
        if (\array_key_exists('CreatedAt', $data) && $data['CreatedAt'] !== null) {
            $object->setCreatedAt($data['CreatedAt']);
            unset($data['CreatedAt']);
        }
        elseif (\array_key_exists('CreatedAt', $data) && $data['CreatedAt'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('UpdatedAt', $data) && $data['UpdatedAt'] !== null) {
            $object->setUpdatedAt($data['UpdatedAt']);
            unset($data['UpdatedAt']);
        }
        elseif (\array_key_exists('UpdatedAt', $data) && $data['UpdatedAt'] === null) {
            $object->setUpdatedAt(null);
        }
        if (\array_key_exists('Name', $data) && $data['Name'] !== null) {
            $object->setName($data['Name']);
            unset($data['Name']);
        }
        elseif (\array_key_exists('Name', $data) && $data['Name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('Labels', $data) && $data['Labels'] !== null) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setLabels($values);
            unset($data['Labels']);
        }
        elseif (\array_key_exists('Labels', $data) && $data['Labels'] === null) {
            $object->setLabels(null);
        }
        if (\array_key_exists('Spec', $data) && $data['Spec'] !== null) {
            $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Docker\\API\\Model\\TaskSpec', 'json', $context));
            unset($data['Spec']);
        }
        elseif (\array_key_exists('Spec', $data) && $data['Spec'] === null) {
            $object->setSpec(null);
        }
        if (\array_key_exists('ServiceID', $data) && $data['ServiceID'] !== null) {
            $object->setServiceID($data['ServiceID']);
            unset($data['ServiceID']);
        }
        elseif (\array_key_exists('ServiceID', $data) && $data['ServiceID'] === null) {
            $object->setServiceID(null);
        }
        if (\array_key_exists('Slot', $data) && $data['Slot'] !== null) {
            $object->setSlot($data['Slot']);
            unset($data['Slot']);
        }
        elseif (\array_key_exists('Slot', $data) && $data['Slot'] === null) {
            $object->setSlot(null);
        }
        if (\array_key_exists('NodeID', $data) && $data['NodeID'] !== null) {
            $object->setNodeID($data['NodeID']);
            unset($data['NodeID']);
        }
        elseif (\array_key_exists('NodeID', $data) && $data['NodeID'] === null) {
            $object->setNodeID(null);
        }
        if (\array_key_exists('AssignedGenericResources', $data) && $data['AssignedGenericResources'] !== null) {
            $values_1 = array();
            foreach ($data['AssignedGenericResources'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\\API\\Model\\GenericResourcesItem', 'json', $context);
            }
            $object->setAssignedGenericResources($values_1);
            unset($data['AssignedGenericResources']);
        }
        elseif (\array_key_exists('AssignedGenericResources', $data) && $data['AssignedGenericResources'] === null) {
            $object->setAssignedGenericResources(null);
        }
        if (\array_key_exists('Status', $data) && $data['Status'] !== null) {
            $object->setStatus($this->denormalizer->denormalize($data['Status'], 'Docker\\API\\Model\\TaskStatus', 'json', $context));
            unset($data['Status']);
        }
        elseif (\array_key_exists('Status', $data) && $data['Status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('DesiredState', $data) && $data['DesiredState'] !== null) {
            $object->setDesiredState($data['DesiredState']);
            unset($data['DesiredState']);
        }
        elseif (\array_key_exists('DesiredState', $data) && $data['DesiredState'] === null) {
            $object->setDesiredState(null);
        }
        foreach ($data as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_2;
            }
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \ArrayObject();
        if ($object->isInitialized('iD') && null !== $object->getID()) {
            $data['ID'] = $object->getID();
        }
        if ($object->isInitialized('version') && null !== $object->getVersion()) {
            $data['Version'] = $this->normalizer->normalize($object->getVersion(), 'json', $context);
        }
        if ($object->isInitialized('createdAt') && null !== $object->getCreatedAt()) {
            $data['CreatedAt'] = $object->getCreatedAt();
        }
        if ($object->isInitialized('updatedAt') && null !== $object->getUpdatedAt()) {
            $data['UpdatedAt'] = $object->getUpdatedAt();
        }
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['Name'] = $object->getName();
        }
        if ($object->isInitialized('labels') && null !== $object->getLabels()) {
            $values = new \ArrayObject();
            foreach ($object->getLabels() as $key => $value) {
                $values[$key] = $value;
            }
            $data['Labels'] = $values;
        }
        if ($object->isInitialized('spec') && null !== $object->getSpec()) {
            $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
        }
        if ($object->isInitialized('serviceID') && null !== $object->getServiceID()) {
            $data['ServiceID'] = $object->getServiceID();
        }
        if ($object->isInitialized('slot') && null !== $object->getSlot()) {
            $data['Slot'] = $object->getSlot();
        }
        if ($object->isInitialized('nodeID') && null !== $object->getNodeID()) {
            $data['NodeID'] = $object->getNodeID();
        }
        if ($object->isInitialized('assignedGenericResources') && null !== $object->getAssignedGenericResources()) {
            $values_1 = array();
            foreach ($object->getAssignedGenericResources() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['AssignedGenericResources'] = $values_1;
        }
        if ($object->isInitialized('status') && null !== $object->getStatus()) {
            $data['Status'] = $this->normalizer->normalize($object->getStatus(), 'json', $context);
        }
        if ($object->isInitialized('desiredState') && null !== $object->getDesiredState()) {
            $data['DesiredState'] = $object->getDesiredState();
        }
        foreach ($object as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_2;
            }
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('Docker\\API\\Model\\Task' => false);
    }
}
