<?php

namespace src\Degree;
use Exception;

/**
 * Class DegreeVerification check $degrees and $nameScale properties in class Degree constructor
 */
class DegreeVerification {

    /**
     * @param integer $degrees
     * @param string $nameScale
     * @throws Exception
     */
    public static function validate($degrees, $nameScale)
    {
        if (empty($degrees)) {
            throw new Exception ("Incorrect degrees");
        }

        if (!array_diff(Scale::$namesDegreesScales,[$nameScale]))
        {
            throw new Exception ("Incorrect degree scale");
        }
    }

}