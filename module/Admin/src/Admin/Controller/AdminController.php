<?php

namespace Admin\Controller;


use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
use Application\Model\Leave;


class AdminController extends BaseController
{
    protected $entityManager;
    protected function setEntityManager(EntityManager $em)
    {
        $this->entityManager = $em;
        return $this;
    }

    protected function getEntityManager()
    {
        if (null === $this->entityManager) {
            $this->setEntityManager($this->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
        }
        return $this->entityManager;
    }

    public function indexAction()
    {


        $repository = $this->getEntityManager()->getRepository('Application\Model\Leaves');
        $posts      = $repository->findAll();
      // $form = new Leave();
        return new ViewModel(array(
         ///   'form' => $form,
            'posts' => $posts
        ) );
    }


}