<?php


namespace SeptemberWerbeagentur\ContaoAssociatesBundle\Model;


use Contao\Model;
use Model\Collection;

class AssociatesModel extends Model
{
    /**
     * Table name
     * @var string
     */
    protected static $strTable = 'tl_associates';

    /**
     * @param $parameters
     * @return Collection|AssociatesModel|null
     */
    public static function findByParameters($parameters) {
        return static::findBy(
            ['types=?'],
            [$parameters['types'][0]]
        );
    }
}
