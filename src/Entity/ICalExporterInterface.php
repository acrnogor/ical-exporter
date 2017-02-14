<?php

namespace Acrnogor\ICalExporter\Entity;

/**
 * Created by PhpStorm.
 * User: zwer
 * Date: 13.02.17.
 * Time: 14:10
 */
interface ICalExporterInterface
{
    /**
     * @return mixed
     */
    public function getUuid();

    /**
     * @param string $uuid
     * @return mixed
     */
    public function setUuid(string $uuid);

    /**
     * Get Start Date
     * - format in 'Ymd\Tgis\Z' in twig template
     *
     * @return \DateTime
     */
    public function getStartDate();

    /**
     * Get End Date
     * - format in 'Ymd\Tgis\Z' in twig template
     *
     * @return \DateTime
     */
    public function getEndDate();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @return string
     */
    public function getLocation();

    /**
     * @return string
     */
    public function getSummary();
}
