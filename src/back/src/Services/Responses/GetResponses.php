<?php
namespace App\Services\Responses;

use Symfony\Component\HttpFoundation\JsonResponse;

class GetResponses
{
  public function __construct()
  {}

  public function fromPhpArrayToJsonResponses($normalizedObject)
  {

    return new JsonResponse(
      $this->getResponsesFormat($normalizedObject),
      200,
      [],
      false
    );
  }

  public function getResponsesFormat($normalizedObject) {
    return [
      'data' => $normalizedObject,
    ];
  }
}
