<?php

declare(strict_types = 1);

class Color
{
    private int $red;
    private int $green;
    private int $blue;

    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }


    public function getRed(): int
    {
        return $this->red;
    }

    private function setRed(int $red)
    {
        $this->validate($red);
        $this->red = $red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    private function setGreen(int $green)
    {
        $this->validate($green);
        $this->green = $green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    private function setBlue(int $blue)
    {
        $this->validate($blue);
        $this->blue = $blue;
    }

    private function validate($value)
    {
        if ($value < 0 || $value > 255) {
            exit("Out of range");
        }
    }

    public function equals(Color $color): bool
    {
        return $this->getRed() == $color->getRed() &&
            $this->getGreen() == $color->getGreen() &&
            $this->getBlue() == $color->getBlue();
    }

    public function mix(Color $color): Color
    {
        return new Color(
            (int)(($this->getRed() + $color->getRed()) / 2),
            (int)(($this->getGreen() + $color->getGreen()) / 2),
            (int)(($this->getBlue() + $color->getBlue()) / 2)
        );
    }


}

$color1 = new Color(255, 250, 240);
$color2 = new Color(254, 251, 241);

$result = $color1->mix($color2);

echo "<pre>";
var_dump($result);
echo "<pre>";

$result = $color1->equals($color2);

echo "<pre>";
var_dump($result);
echo "<pre>";