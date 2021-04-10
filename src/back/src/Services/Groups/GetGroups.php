<?php
namespace App\Services\Groups;

use App\Repository\GroupRepository;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class GetGroups
{
  public function __construct(
    GroupRepository $groupRepository,
    NormalizerInterface $normalizers
  )
  {
    $this->groupRepository  = $groupRepository;
    $this->normalizers      = $normalizers;
  }

  public function getAllGroupsInJson()
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

  private function normalizedGroups($groups, $tags) 
  {
    return $this->normalizers->normalize(
      $groups,
      null,
      ['groups' => $tags]
    );
  }
}