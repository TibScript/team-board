<?php

namespace App\Controller;

use App\Entity\Group;
use App\Services\Groups\GetGroups;
use App\Services\Responses\GetResponses;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/groups", name="groups")
 */
class GroupsController extends AbstractController
{
    /**
     * @Route("/root/", name="list-root", methods={"GET"})
     */
    public function getAllRootGroups(
        GetGroups $getGroup,
        GetResponses $getResponses
    ): Response {
        return $getResponses->fromPhpArrayToJsonResponses(
            $getGroup->getAllRootGroupsInPhpArray()
        );
    }

    /**
     * @Route("/", name="list", methods={"GET"})
     */
    public function getAllGroups(
        GetGroups $getGroup,
        GetResponses $getResponses
    ): Response {
        return $getResponses->fromPhpArrayToJsonResponses(
            $getGroup->getAllGroupsInPhpArray()
        );
    }

    /**
     * @Route("/{id}", name="get", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function getOneGroup(
        int $id,
        GetGroups $getGroup,
        GetResponses $getResponses
    ): Response {
        return $getResponses->fromPhpArrayToJsonResponses(
            $getGroup->getOneGroupsInPhpArray($id)
        );
    }
}
