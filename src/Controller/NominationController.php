<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\{Request, Response};
use App\Controller\Api\UserController;
use App\Entity\{User, Nomination, Comments};
use App\Form\{NominateType, CommentsType};

use Symfony\Component\Form\Extension\Core\Type\{ DateType, TextType};

class NominationController extends Controller
{
    /**
     * @Route("/nominations", name="main.nomination")
     */
    public function index()
    {

        return $this->render('main/nominate/index.html.twig');
    }

    /**
     * @Route("/nominate", name="nominate")
     */
    public function nominate(Request $request)
    {
      return $this->render('main/nominate/create.html.twig');

    }

    /**
     * @Route("/nominate/store", name="store.nominee")
     */
    public function store(Request $request)
    {
      // validate is the user is not voting themself
      $userName = strtolower($request->get('user'));
      $nomineeName = strtolower($request->get('nominee'));


        $user = $this->getDoctrine()->getRepository(User::class)->findByusername($request->get('user'));
        $nominee = $this->getDoctrine()->getRepository(User::class)->findByusername($request->get('nominee'));
        $nomination = new Nomination();
        $comment = new Comments();

        if ($nominee[0] != $user[0]) {
          $em = $this->getDoctrine()->getManager();
          $nomination->setNominee($nominee[0]);
          $nomination->setUser($user[0]);

          $comment->setNomination($nomination);
          $comment->setComment($request->get('comment'));

          $em->persist($nomination);
          $em->persist($comment);
          $em->flush();
          $id = $nomination->getId();
          return $this->redirectToRoute('main.nomination');
        }else{
          return new Response('sorry you can not vote for yourself');
        }

        return $this->redirectToRoute('main.nomination');
    }

    public function serializeUsersDetails(User $users)
    {
        return [
            'username' => $users->getUsername(),
            'email' => $users->getEmail(),
            'avatar' => $users->getAvatar()
        ];
    }


}
