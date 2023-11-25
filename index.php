<?php
require_once __DIR__ .'/vendor/autoload.php';
class ColorValueObject {
    private $red;
    private $green;
    private $blue;

    public function __construct($red, $green, $blue) {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    public function getRed() {
        return $this->red;
    }

    public function setRed($red) {
        $this->validateColorValue($red);
        $this->red = $red;
    }

    public function getGreen() {
        return $this->green;
    }

    public function setGreen($green) {
        $this->validateColorValue($green);
        $this->green = $green;
    }

    public function getBlue() {
        return $this->blue;
    }

    public function setBlue($blue) {
        $this->validateColorValue($blue);
        $this->blue = $blue;
    }

    private function validateColorValue($value) {
        if ($value < 0 || $value > 255) {
            throw new InvalidArgumentException("Invalid color value. Value must be between 0 and 255.");
        }
    }

    public function equals(ColorValueObject $otherColor) {
        return $this->red === $otherColor->getRed() &&
            $this->green === $otherColor->getGreen() &&
            $this->blue === $otherColor->getBlue();
    }

    public static function random() {
        $red = mt_rand(0, 255);
        $green = mt_rand(0, 255);
        $blue = mt_rand(0, 255);
        return new ColorValueObject($red, $green, $blue);
    }
    public function mix(ColorValueObject $otherColor) {
        $mixedRed = ($this->getRed() + $otherColor->getRed()) / 2;
        $mixedGreen = ($this->getGreen() + $otherColor->getGreen()) / 2;
        $mixedBlue = ($this->getBlue() + $otherColor->getBlue()) / 2;
        return new ColorValueObject($mixedRed, $mixedGreen, $mixedBlue);
    }
}

$color = new ColorValueObject(250, 250, 250);
$otherColor = new ColorValueObject(100, 100, 100);
$mixedColor = $color->mix($otherColor);

echo $mixedColor->getRed();