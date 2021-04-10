<?php

namespace App\Controller;

use App\Services\Groups\GetGroups;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupController extends AbstractController
{
    /**
     * @Route("/group", name="group")
     */
    public function index(
        GetGroups $getGroup
    ): Response {
        return $this->json($getGroup->getAllGroupsInJson());
    }
}
