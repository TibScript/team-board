<?php
namespace App\Services\Groups;

use App\Repository\GroupRepository;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class GetGroups
{
  public function __construct(
    GroupRepository $groupRepository,
    NormalizerInterface $normalizers,
    SerializerInterface $serializer
  )
  {
    $this->groupRepository  = $groupRepository;
    $this->normalizers      = $normalizers;
    $this->serializer       = $serializer;
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

  public function getOneGroupsInPhpArray($id)
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

  public function getOneGroupsInJson($id)
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
    return $this->normalizers->normalize(
      $groups,
      null,
      ['groups' => $tags]
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
      ['groups' => $tags]
    );
  }
}
