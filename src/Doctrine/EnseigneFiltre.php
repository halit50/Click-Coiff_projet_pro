<?php


namespace App\Doctrine;


use App\Entity\User;
use App\Entity\Fichier;
use App\Entity\Enseigne;
use App\Entity\PrestationServices;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Filter\SQLFilter;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Annotations\Annotation\Target;

class EnseigneFiltre extends SQLFilter
{

    public const NAME = 'enseigne_user_filter';
    public const PARAM_USER_ID = 'userid';
    public const PARAM_ENSEIGNE_ID = 'user_enseigne_id';
    public const PARAM_PRESTATION_ID = 'user_prestation_id';

    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
    {


        //dd($targetEntity->getReflectionClass()->name, Fichier::class);

        if ($targetEntity->getReflectionClass()->name == Enseigne::class) {

            $userId = $this->getParameter(self::PARAM_USER_ID);
            return sprintf('%s.user_id =  %s ', $targetTableAlias, $userId);
        }

        if ($targetEntity->getReflectionClass()->name == Fichier::class) {

            $enseigneId = $this->getParameter(self::PARAM_ENSEIGNE_ID);
            //dd($enseigneId);
            return sprintf('%s.enseigne_id =  %s ', $targetTableAlias, $enseigneId);
        }
      

        if ($targetEntity->getReflectionClass()->name == PrestationServices::class) {

            $prestationId = $this->getParameter(self::PARAM_ENSEIGNE_ID);
            
            return sprintf('%s.enseigne_id =  %s ', $targetTableAlias, $prestationId);
        }
        return '';
    }
}
