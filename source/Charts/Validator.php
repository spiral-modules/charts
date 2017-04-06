<?php

namespace Spiral\Charts;

class Validator
{
    /** @var array */
    protected $charts = [
        'line',
        'bar',
        'radar',
        'doughnut',
        'polarArea',
        'bubble',
    ];

    /**
     * @param string $chart
     * @return null|string
     */
    public function validateChart(string $chart)
    {
        foreach ($this->charts as $elem) {
            if (strcasecmp($elem, $chart) === 0) {
                return $elem;
            }
        }

        return null;
    }
}