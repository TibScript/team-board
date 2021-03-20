<?php
// src/Controller/TeamBoardController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class TeamBoardController
{
    public function index(): Response
    {
        return new Response(
            "{ 
                name: 'Tree 1',
                uid: 0,
                children: [
                    {
                        name: 'Group 1',
                        uid: 1,
                        children: [
                            {
                                name: 'Group A',
                                uid: 2
                            },
                            {
                                name: 'Group B',
                                uid: 3
                            },
                        ]
                    }, {
                        name: 'Group 2',
                        uid: 4,
                        children: [
                            {
                                name: 'Group B',
                                uid: 3
                            },
                            {
                                name: 'Group C',
                                uid: 5
                            },
                        ] 
                    }
                ]
            }"
        );
    }
}