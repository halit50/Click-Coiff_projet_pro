<?php


namespace App\Doctrine;


use App\Entity\Enseigne;
use App\Entity\User;
use Doctrine\Common\Annotations\Annotation\Target;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;
use Symfony\Component\HttpFoundation\Request;

class EnseigneFiltre extends SQLFilter
{
    
    public const NAME='enseigne_user_filter';
    public const PARAM_USER_ID='userid';

    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
    {
        //dd($targetEntity);
        
        
        if ($targetEntity->getReflectionClass()->name != Enseigne::class) {
            return '';
        }
        $userId=$this->getParameter(self::PARAM_USER_ID);
        return sprintf('%s.user_id =  %s ',$targetTableAlias, $userId);
    
    }

}