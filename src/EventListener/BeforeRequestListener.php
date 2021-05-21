<?php


namespace App\EventListener;


use App\Entity\User;
use App\Entity\Enseigne;
use Doctrine\ORM\EntityManager;
use App\Doctrine\EnseigneFiltre;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class BeforeRequestListener
{

    /**
     * @var EntityManager
     */
    private $em;
    /**
     * @var Security
     */
    private $security;

    public function __construct(EntityManagerInterface $em,Security $security)
    {
        $this->em = $em;
        $this->security = $security;

    }

    public function onKernelRequest(RequestEvent $event)
    {

        $user = $this->security->getUser();
        //$roles= $user->getRoles()??[];
        if(null==$user || !in_array(User::ROLE_ADMIN,$user->getRoles()??[])){
            return;
        }

        $user = $this->em->getRepository(User::class)->findOneBy(['email'=>$user->getUsername()]);
        
        $filter = $this->em
            ->getFilters()
            ->enable(EnseigneFiltre::NAME);
        $filter->setParameter(EnseigneFiltre::PARAM_USER_ID, $user->getId());
    }
    
} 