<?php

namespace App\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\{Request, Response, JsonResponse};
use App\Controller\Api\VotesController;
use App\Entity\{Votes, Nomination};
use App\Form\NominateType;

use Symfony\Component\Form\Extension\Core\Type\{ DateType, TextType};

class VoteController extends Controller implements \JsonSerializable
{

  private $array;
    /**
     * @Route("/api/Votes")
     */
    public function index()
    {
        $Votes = $this->getDoctrine()->getManager()
                    ->getRepository(Votes::class)
                    ->findAll();

        $response = new JsonResponse(($Votes));
        // $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    public function serializeVotesDetails(Votes $Votes)
    {
        return [
            'Votesname' => $Votes->getVotesname(),
            'email' => $Votes->getEmail(),
            'avatar' => $Votes->getAvatar()
        ];
    }

    public function serializeNominationDetails($Votes)
    {
        return [
             'test' => $Votes->Nomination
             // 'nominee' => $Votes[1]

        ];
    }

    /**
     * @Route("/api/vote/update/{nomination}")
     */
    public function updateAction($nomination)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $nomination = $entityManager->getRepository(Nomination::class)->find($nomination);
        $votes = $entityManager->getRepository(Votes::class)->findByNomination($nomination);


        if (!$nomination) {
            throw $this->createNotFoundException(
                'Not a nominee '

            );
        }else{
        if (!$votes) {
          $newVote = new Votes();
          $newVote->setNomination($nomination);
          $newVote->setVotes(1);

          $entityManager->persist($newVote);
          $entityManager->flush();
        } else {
        $votes->setVotes(1);
        $entityManager->flush();

      }
      $voteCount = $entityManager->getRepository(Votes::class)->findAll();
      $response = new Response(json_encode($voteCount), 200);
      $response->headers->set('Content-Type', 'application/json');
      return $response;
    }
  }

    /**
     * @Route("/api/voteload")
     */
    public function testing(Request $request)
    {
      $entityManager = $this->getDoctrine()->getManager();
      $voteCount = $entityManager->getRepository(Votes::class)->findAll();
      $response = new Response(json_encode($voteCount), 200);
      $response->headers->set('Content-Type', 'application/json');
      return $response;
    }


    public function jsonSerialize() {
        return $this->array;
    }

}
