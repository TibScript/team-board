<?php

namespace App\Controller;

use App\Services\Groups\GetGroups;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupsController extends AbstractController
{
    /**
     * @Route("/groups", name="groups")
     */
    public function index(
        GetGroups $getGroup
    ): Response {
        return $this->json($getGroup->getAllGroupsInJson());
    }
}
