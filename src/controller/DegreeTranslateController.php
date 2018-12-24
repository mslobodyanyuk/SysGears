<?php
namespace src\controller;
use src\Degree\Degree;

/**
 * Class Degree Translate Controller, the controller performs Actions according to the address bar.
 */
class DegreeTranslateController {

    /**
     * Method (Action) indexAction() of controller is executed by default
     * when specifying the address bar http: //sysgears1.loc/, view index.php
     */
    public function indexAction()
    {
        /***********************************check***********************************/

        $degree[] = $d1 = new Degree('26C');
        //        $degree[] = $d1->getDegrees();
        //        $degree[] = $d1->getNameScale();
        //        $degree[] = $d1->getConvertDegrees();

            //$degree[] = $d2 = new Degree('26');
            //$degree[] = $d3 = new Degree('С');

        $degree[] = $d4 = new Degree('299K');
        //        $degree[] = $d4->getDegrees();
        //        $degree[] = $d4->getNameScale();
        //        $degree[] = $d4->getConvertDegrees();

            //$degree[] = $d5 = new Degree('299');
            //$degree[] = $d6 = new Degree('K');

        $degree[] = $d7 = new Degree('79F');
        //        $degree[] = $d7->getDegrees();
        //        $degree[] = $d7->getNameScale();
        //        $degree[] = $d7->getConvertDegrees();
            //$degree[] = $d8 = new Degree('79');
            //$degree[] = $d9 = new Degree('F');

        /***********************************check***********************************/
        return $degree;
    }

}