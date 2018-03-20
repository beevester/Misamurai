<?php

namespace App\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\{Request, Response, JsonResponse};
use App\Controller\Api\UserController;
use App\Entity\{User, Permission, Roles};
use App\Form\NominateType;

use Symfony\Component\Form\Extension\Core\Type\{ DateType, TextType};

class PermissionController extends Controller implements \JsonSerializable
{

  private $array;
    /**
     * @Route("/api/permissions")
     */
    public function index()
    {
        $permissions = $this->getDoctrine()->getManager()
                    ->getRepository(Permission::class)
                    ->findAll();

        $response = new JsonResponse(($permissions));

        return $response;
    }


    public function serializeUsersDetails(User $users)
    {
        return [
            'username' => $users->getUsername(),
            'email' => $users->getEmail(),
            'avatar' => $users->getAvatar()
        ];
    }

    public function serializeNominationDetails($comments)
    {
        return [
             'test' => $comments->Nomination
             // 'nominee' => $comments[1]

        ];
    }


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

    /**
     * @Route("/api/comment/store")
     */
    public function testing(Request $request)
    {
      // $data = json_decode($request->get(), true);
dump($request);die;
      return new Response($data);
    }


    public function jsonSerialize() {
        return $this->array;
    }

}
