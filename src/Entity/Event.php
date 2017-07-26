<?php

namespace Acrnogor\ICalExporter\Entity;

use Ramsey\Uuid\Uuid;

/**
 * Class Event
 * - example of a class you could use when exporting events to ICS format
 *
 * @package ICalExporter\Entity
 */
class Event implements ICalExporterInterface
{
    public $startDate;
    public $endDate;
    public $location;
    public $description;
    public $summary;
    public $uuid;
    public $url;

    /** @var Recurrence */
    public $recurrence;

    /**
     * @param $uuid
     * @throws \InvalidArgumentException when invalid Uuid given
     * @return Event
     */
    public function setUuid(string $uuid)
    {
        if (!Uuid::isValid($uuid)) {
            throw new \InvalidArgumentException(sprintf('Unable to set Uuid, invalid Uuid given (%s)', $uuid));
        }

        $this->uuid = $uuid;
    }

    /**
     * @return mixed
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return Recurrence
     */
    public function getRecurrence()
    {
        return $this->recurrence;
    }
}