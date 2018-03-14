<?php

namespace App\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\{Request, Response, JsonResponse};
use App\Controller\Api\UserController;
use App\Entity\{User, Nomination, Comments};
use App\Form\NominateType;

use Symfony\Component\Form\Extension\Core\Type\{ DateType, TextType};

class NominationController extends Controller implements \JsonSerializable
{

  private $array;
    /**
     * @Route("/api/nominations")
     */
    public function index()
    {
      $nominations = $this->getDoctrine()->getManager()
                    ->getRepository(Nomination::class)
                    ->findAll();

        $response = new Response(json_encode($nominations), 200);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/api/nominate")
     */
    public function nominate(Request $request)
    {

    }

    public function serializeUsersDetails(User $users)
    {
        return [
            'username' => $users->getUsername(),
            'email' => $users->getEmail(),
            'avatar' => $users->getAvatar()
        ];
    }

    public function serializeNominationDetails($nominations)
    {
        return [
             'test' => $this->serializeUsersDetails($nominations[0])
             // 'nominee' => $nominations[1]

        ];
    }

    /**
     * @Route("/api/nominate/store")
     */
    public function store(Request $request)
    {
      $user = $this->getDoctrine()->getRepository(User::class)->findByusername($request->get('user'));
      $nominee = $this->getDoctrine()->getRepository(User::class)->findByusername($request->get('nominee'));

      $nomination = new Nomination();
      $comment = new Comments();
      $commentNote = $request->get('comment');
      $em = $this->getDoctrine()->getManager();
      $nomination->setNominee($nominee);
      $nomination->setUser($user);

      $comment->setNomination($nomination);
      $comment->setComment($commentNote);

      $em->persist($nomination);
      $em->persist($comment);
      $em->flush();

      return null;
    }

    public function jsonSerialize() {
        return $this->array;
    }

}
