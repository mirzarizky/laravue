<?php

namespace App\Objects;

use Spatie\DataTransferObject\DataTransferObject;

class TotalNpsScoreObject extends DataTransferObject
{
    public $passives;
    public $promoters;
    public $detractors;
    public $total;

    public function getScore()
    {
        if (!$this->total) {
            return 0;
        }

        return (($this->promoters/$this->total) - ($this->detractors/$this->total)) * 100;
    }
}
