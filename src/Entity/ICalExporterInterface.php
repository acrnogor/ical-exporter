<?php

namespace Acrnogor\ICalExporter\Entity;

interface ICalExporterInterface
{
    public function getUuid(): string;

    public function setUuid(string $uuid): ICalExporterInterface;

    public function getDescription(): string;

    public function getUrl(): string;

    public function getLocation(): string;

    public function getSummary(): string;

    public function getType(): int;

    /**
     * Get Start Date
     * - format in 'Ymd\Tgis\Z' in twig template
     *
     * @return \DateTime
     */
    public function getStartDate(): \DateTime;

    /**
     * Get End Date
     * - format in 'Ymd\Tgis\Z' in twig template
     *
     * @return \DateTime
     */
    public function getEndDate(): \DateTime;

}
