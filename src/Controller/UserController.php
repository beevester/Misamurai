<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\NewUserType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends Controller
{
    /**
     * @Route("/users", name="users")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('App\Entity\User')->findAll();

        $userApi = [];

        foreach ($users as $user) {
            $userApi[] = $this->serializeUsersDetails($user);
            }

        
        return $this->render('manage/index.html.twig', ['userApi' => json_encode($userApi)]);
    }

    public function serializeUsersDetails(User $users)
    {
        return [
            'username' => $users->getUsername(),
            'email' => $users->getEmail(),
            'avatar' => $users->getAvatar()
        ];
    }
    /**
     * @Route("/user/create", name="create_user")
     */
    public function create(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        
        $user = new User();
        
        $user->setPlainPassword('password');
        $user->setEmail('nyiko@mail.co.za');
        $form = $this->createForm(NewUserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $user->setEmail($user->getUsername().'@app.com');
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setAvatar('Place holder');
            $user->setApiKey('chechout'.$user->getEmail());
            $user = $form->getData();
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($user);
            $em->flush();



            return new Response('Done');
        }

        return $this->render('manage/users/create.html.twig', [
            'userForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/store", name="store.user")
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users'
        ]);

        if (!empty($request->password)){
            $password = trim($request->password);
        }else{
            $length = 10;
            $keyspace = '123456789qwertyuiopasdfghjklzxcvbnm';
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i = 0; $i < $length; $i++){
                $str .= $keyspace[random_int(0, $max)];
            }
            $user->password = Hash::make($str);
             }
             $user = new User();
             $user->name = $request->name;
             $user->email = $request->email;
             $user->password = Hash::make($request->password);

             if ($user->save()) {
                 return redirect()->route('users.show', $user->id);

             }else{
                 Session::flash('danger', 'Sorry a problem occurred while creating this user.');
                 return redirect()->route('users.create');
             }
    }

    /**
     * @Route("/user/{id}", name="show.user")
     */
    public function show($id)
    {

        //
        $user = User::where('id',$id)->with('roles')->first();
         return view("manage.users.show")->withUser($user);
    }

    /**
     * @Route("/user/edit/{id}", name="edit.user")
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view("manage.users.edit")->withUser($user);
    }

    /**
     * @Route("/user/update/{id}", name="update.user")
     */
    public function update(Request $request, $id)
    {
        //
         $this->validate($request, [
              'name' => 'required|max:255',
              'email' => 'required|email|unique:users'
          ]);

          $user = User::findOrFail($id);
          $user->name = $request->name;
          $user->email = $request->email;

          if (!empty($request->password)){
// must check what how to include Request call
              $length = 10;
              $keyspace = '123456789qwertyuiopasdfghjklzxcvbnm';
              $str = '';
              $max = mb_strlen($keyspace, '8bit') - 1;
              for ($i = 0; $i < $length; $i++){
                  $str .= $keyspace[random_int(0, $max)];
              }
              $user->password = Hash::make($str);
          }
          $user->password = Hash::make($request->password);

          if ($user->save()) {
             return redirect()->route('users.show', $id);

         }else{
             Session::flash('danger', 'Sorry a problem occurred while creating this user.');
             return redirect()->route('users.edit', $id);
         }

         return redirect()->route('users.edit', $id);

   }

     /**
    * @Route("/user/remove/{id}", name="delete.user")
    */
   public function destroy($id)
   {
       //
   }




}
