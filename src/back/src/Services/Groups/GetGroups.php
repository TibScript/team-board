<?php
namespace App\Services\Groups;

use App\Repository\GroupRepository;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class GetGroups
{
  public function __construct(
    GroupRepository $groupRepository,
    NormalizerInterface $normalizer,
    SerializerInterface $serializer
  )
  {
    $this->groupRepository  = $groupRepository;
    $this->normalizer       = $normalizer;
    $this->serializer       = $serializer;
  }

  private function getDefaultNormalizerOption($tags) {
    return [
      'groups' => $tags,
      AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
        return $object->getId();
      },
      AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true
    ];
  }

  public function getAllRootGroupsInPhpArray()
  {
    $groups = $this->groupRepository->findAllRoot();
    return $this->normalizedGroups(
      $groups,
      [
        'group:detail',
        'member:detail'
      ]
    );
  }

  public function getAllGroupsInPhpArray()
  {
    $groups = $this->groupRepository->findall();

    return $this->normalizedGroups(
      $groups,
      [
        'group:detail',
        'member:detail'
      ]
    );
  }

  public function getOneGroupInPhpArray($id)
  {
    $groups = $this->groupRepository->find($id);

    return $this->normalizedGroups(
      $groups,
      [
        'group:detail',
        'member:detail'
      ]
    );
  }

  public function getAllGroupsInJson()
  {
    $groups = $this->groupRepository->findall();

    return $this->serializedGroups(
      $groups,
      'json',
      [
        'group:detail',
        'member:detail'
      ]
    );
  }

  public function getOneGroupInJson($id)
  {
    $groups = $this->groupRepository->find($id);

    return $this->serializedGroups(
      $groups,
      'json',
      [
        'group:detail',
        'member:detail'
      ]
    );
  }

  /**
   * return a php array of object
  */
  private function normalizedGroups($groups, $tags) 
  {
    return $this->serializer->normalize(
      $groups,
      null,
      $this->getDefaultNormalizerOption($tags)
    );
  }

  /**
   * return a json of array
   */
  private function serializedGroups($groups, $format, $tags)
  {
      return $this->serializer->serialize(
        $groups,
        $format,
        $this->getDefaultNormalizerOption($tags)
      );
  }
}
