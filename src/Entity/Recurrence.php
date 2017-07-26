<?php

namespace Acrnogor\ICalExporter\Entity;

class Recurrence
{
    /** @var string */
    public $frequency;

    /** @var int */
    public $interval;

    /**
     * Recurrence constructor.
     *
     * @param $frequency
     * @param $interval
     */
    public function __construct($frequency, $interval = null)
    {
        $supportedFrequencies = ['SECONDLY', 'MINUTELY', 'HOURLY', 'DAILY', 'WEEKLY', 'MONTHLY', 'YEARLY'];

        if (!in_array($frequency, $supportedFrequencies)) {
            throw new \InvalidArgumentException(
                'ICal RFC5545 supports the following frequencies: '.implode(', ', $supportedFrequencies)
            );
        }

        $this->frequency = $frequency;

        if (null !== $interval && !is_numeric($interval)) {
            throw new \InvalidArgumentException('The interval has to be a numeric');
        }

        $this->interval = $interval;
    }
}