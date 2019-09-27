<?php


namespace SeptemberWerbeagentur\ContaoAssociatesBundle\Model;


use Contao\Model;

class AssociatesModel extends Model
{
    /**
     * Table name
     * @var string
     */
    protected static $strTable = 'tl_associates';

    /**
     * @param $parameters
     * @return array|null
     */
    public static function findAssociatesBy($parameters) {
        $all = static::fetchAssociates();
        $result = [];
        $params = [];

        foreach ($parameters as $parameter => $value) {
            if ($value !== '0') $params[$parameter] = $value;
        }

        foreach ($all as $associate) {
            $matchesAll = true;

            foreach ($params as $key => $param) {
                if (!in_array($param, $associate->$key)) $matchesAll = false;
            }

            if ($matchesAll) array_push($result, $associate);
        }

        return $result;
    }

    protected static function fetchAssociates() {
        $associates = AssociatesModel::findAll(['return' => 'Array']);
        foreach ($associates as $associate) {
            $associate->image = \FilesModel::findByUuid($associate->image);
            $associate->logo = \FilesModel::findByUuid($associate->logo);
            $associate->types = unserialize($associate->types);
            $associate->services = unserialize($associate->services);
            $associate->branches = unserialize($associate->branches);
            $associate->languages = unserialize($associate->languages);
        }

        return $associates;
    }
}
