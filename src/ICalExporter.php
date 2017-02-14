<?php

namespace Acrnogor\ICalExporter;

use Acrnogor\ICalExporter\Entity\ICalExporterInterface;
use Twig_Environment;

class ICalExporter
{
    /**
     * ICalExporter constructor.
     * @param Twig_Environment $twig
     */
    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * Get ICal data as string only
     *  - will not download file
     *
     * @param array $iCalItems
     * @throws \InvalidArgumentException when array contains items that do not implement the right interface
     * @return string
     */
    public function getICalDataAsString(array $iCalItems)
    {
        // verify all items are importing the correct interface
        foreach ($iCalItems as $iCalItem) {
            if ( !($iCalItem instanceof ICalExporterInterface) ) {
                throw new \InvalidArgumentException('All iCalItems must implement ICalExporterInterface');
            }
        }

        $icsBody = $this->twig->render('ical-template.twig', [
            'items' => $iCalItems
        ]);

        return $icsBody;
    }

    /**
     * Download data in ICal format
     * @param ICalExporterInterface[] $iCalItems
     * @param string $filename
     * @throws \InvalidArgumentException when not all objects in array are implementing the required interface
     */
    public function downloadAsICal(array $iCalItems, $filename = 'calendar.ics')
    {
        $icsBody = $this->getICalDataAsString($iCalItems);

        header('Content-type: text/calendar; charset=utf-8');
        header('Content-Disposition: inline; filename='. $filename);
        echo $icsBody;
    }
}

