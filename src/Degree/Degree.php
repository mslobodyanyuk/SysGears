<?php
namespace src\Degree;

/**
 * Class Degree separate input data into degree and scale name, converted degrees into another scales.
 */
class Degree
{
    /**
     * @var integer
     */
    private $degrees;

    /**
     * @var string
     */
    private $nameScale;

    /**
     * @var string
     */
    private $convertedDegrees;

    /**
     * @param string $stringDegrees
     * @throws \Exception
     */
    public function __construct($stringDegrees)
    {
        $this->separateDegreesAndNameScale($stringDegrees);
        DegreeVerification::validate($this->degrees, $this->nameScale);
        $this->convertedDegrees = $this->conversionDegrees($this->degrees, $this->nameScale);
    }

    /**
     * @return int
     */
    public function getDegrees()
    {
        return $this->degrees;
    }

    /**
     * @return string
     */
    public function getNameScale()
    {
        return $this->nameScale;
    }

    /**
     * @return string
     */
    public function getConvertDegrees()
    {
        return $this->convertedDegrees;
    }

    /**
     * @return string
     */
    private function conversionDegrees()
    {
        switch($this->nameScale) {
            case Scale::CELSIUS_DEGREE_SCALE :{ $conversionDegrees = Scale::convertCelsius($this->degrees); break;}
            case Scale::KELVIN_DEGREE_SCALE :{ $conversionDegrees = Scale::convertKelvin($this->degrees); break;}
            case Scale::FAHRENHEIT_DEGREE_SCALE :{ $conversionDegrees = Scale::convertFahrenheit($this->degrees); break;}
        }
        return $conversionDegrees;
    }

    /**
     * @return array
     */
    private function separateDegreesAndNameScale($stringDegrees)
    {
        for($i=0; $i<strlen($stringDegrees); $i++) {
            is_numeric($stringDegrees[$i]) ? $this->degrees .= $stringDegrees[$i] : $this->nameScale .= $stringDegrees[$i];
        }
        return [$this->degrees, $this->nameScale];
    }

}
