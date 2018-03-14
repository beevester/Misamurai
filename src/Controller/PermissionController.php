<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\PermissionsType;
use App\Entity\Permission;

class PermissionController extends Controller
{
    /**
     * @Route("/manage/permission", name="manage.permission")
     */
    public function index()
    {
        // replace this line with your own code!
        $em = $this->getDoctrine()
                   ->getManager()
                   ->getRepository(Permission::class)
                   ->findAll();
        return $this->render('manage/permissions/index.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }

    /**
     * @Route("/manage/permission/store", name="store.permission")
     */
    public function store(Request $request)
    {
        //
        $em = $this->getDoctrine()->getManager();
        $permission = new Permission();

        $permisionType = $request->get('permissionType');
        if ($permisionType == 'Crud')
        {

          $crud = explode(',', $request->get('crud_selected'));
          $resource = $request->get('resource');
          foreach ($crud as $value) {
            $em = $this->getDoctrine()->getManager()->getRepository(Permission::class);
            $u = ucfirst($value);
            $permission = new Permission();
            $permission->setName($value.'-'.$resource);
            $permission->setDisplay_name($u.' '.$permisionType);
            $permission->setDescription($u.' '.$permisionType);
            $perm = $em->findOneBy(['name' => $permission->getName()]);

            // Confirms if there is no existing permssion
            if ($perm == null){
              $em = $this->getDoctrine()->getManager();
              $em->persist($permission);
              $em->flush();
            }else{
            
            }
          };

        };

        if ($permisionType == 'Basic')
        {

        }
dump('done');die;


    }
    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     * @Route("/manage/permissions/edit/{id}", name="edit.permission")
     */
    public function edit($id)
    {
      $permission = $this->getDoctrine()->getManager()
                         ->getRepository('App\Entity\Permission')
                         ->find($id);
      return $this->render('manage/permissions/edit.html.twig', ['permission' => $permission]);
  }

  /**
   * @Route("/manage/permissions/create", name="create.permission")
   */
  public function create()
  {
      // replace this line with your own code!
      return $this->render('manage/permissions/create.html.twig');
  }

  public function serializePermissionDetails(Permission $permissions)
  {
      return [
          'name' => $permissions->getName(),
          'display_name' => $permissions->getDisplay_name(),
          'description' => $permissions->getDescription()
      ];
  }
}
