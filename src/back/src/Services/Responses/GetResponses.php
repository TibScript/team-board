<?php
namespace App\Services\Responses;

use Symfony\Component\HttpFoundation\JsonResponse;

class GetResponses
{
  public function __construct()
  {}

  public function getJsonResponses($normalizedObject) 
  {

    return new JsonResponse(
      [
        'data' => $normalizedObject,
      ],
      200,
      [],
      true
    );
  }
}