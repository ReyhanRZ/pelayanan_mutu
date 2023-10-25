<?php

class M_cucitangan extends CI_Model
{

    function hitung($numerator, $denominator)
    {
        $rumus = ($numerator / $denominator) * 100;
        return $rumus;
    }
}
