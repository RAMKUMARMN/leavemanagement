<?php

namespace Employee\Controller;


use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
use Application\Model\Leave;
use Application\ModeL\Employee;


class EmployeeController extends BaseController
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

return new viewModel();
      //  $repository = $this->getEntityManager()->getRepository('Application\Model\Leaves');
       // $posts      = $repository->findAll();
       // $form = new Leave();
       // return new ViewModel(array(
    //   'form' => $form,
         //   'posts' => $posts
       // ) );
    }

    public function applyAction()
    {
        if($this->getRequest()->isPost())
        {
            try
            {
                $posts=$this->params()->fromPost();
                if (!isset($posts['l_type']) ) {
                    $this->flashMessenger()->addMessage("Sorry please fill in all required fields!");
                    return $this->redirect()->toUrl('/employee/apply');
                }

                //print_r($posts);die;
                $this->getEM()->getRepository('Application\Model\Leaves');
                $firstDay= $posts['lesson_from'];//date
                $lastDay=$posts['lesson-to'];//date
                $diff = $lastDay->sub($firstDay)->toValue();
                $days = ceil($diff/60/60/24) +1;

                $leaves = new Leaves();
                $leaves->setEmployee('test')
                    ->setDays($days)
                    ->setStatus('Pending')
                    ->setDate(new \DateTime($posts['lesson-from']))
                    ->setComments($posts['comments'])
                    ->setType($posts['l_type']);


                $this->getEM()->persist($leaves);
                $this->getEM()->flush();
                $this->flashMessenger()->addMessage("Successfully saved new album!");
                return $this->redirect()->toUrl('/employee');

            }
            catch(\Exception $e)
            {
                error_log($e->getMessage());
                $this->flashMessenger()->addMessage("Some error occurred !");
                return $this->redirect()->toUrl('/employee/apply');
            }
        }

        return new ViewModel();
    }


    public function editAction()
    {

    }

    public function deleteAction()
    {

    }



}