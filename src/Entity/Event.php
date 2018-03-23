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
    public const TYPE_REGULAR   = 0;
    public const TYPE_ALL_DAY   = 1;

    public $startDate;
    public $endDate;
    public $location;
    public $description;
    public $summary;
    public $uuid;
    public $url;
    public $type = self::TYPE_REGULAR;

    /** @var Recurrence */
    public $recurrence;

    /**
     * @param $uuid
     * @throws \InvalidArgumentException when invalid Uuid given
     * @return Event
     */
    public function setUuid(string $uuid): ICalExporterInterface
    {
        if (!Uuid::isValid($uuid)) {
            throw new \InvalidArgumentException(sprintf('Unable to set Uuid, invalid Uuid given (%s)', $uuid));
        }

        $this->uuid = $uuid;
        return $this;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate(): \DateTime
    {
        return $this->endDate;
    }

    /**
     * @return mixed
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return Recurrence
     */
    public function getRecurrence(): Recurrence
    {
        return $this->recurrence;
    }
}