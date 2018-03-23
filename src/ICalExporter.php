<?php

namespace Acrnogor\ICalExporter;

use Acrnogor\ICalExporter\Entity\ICalExporterInterface;
use Twig_Environment;

class ICalExporter
{
    /**
     * @var Twig_Environment
     */
    private $twig;

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
     * @return string
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function getICalDataAsString(array $iCalItems): string
    {
        foreach ($iCalItems as $iCalItem) {
            if ( !($iCalItem instanceof ICalExporterInterface) ) {
                throw new \InvalidArgumentException('All iCalItems must implement ICalExporterInterface');
            }
        }

        return $this->twig->render('ical-template.twig', ['events' => $iCalItems]);
    }

    /**
     * Download data in ICal format
     * @param ICalExporterInterface[] $iCalItems
     * @param string $filename
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function downloadAsICal(array $iCalItems, $filename = 'calendar.ics'): void
    {
        $icsBody = $this->getICalDataAsString($iCalItems);

        header('Content-type: text/calendar; charset=utf-8');
        header('Content-Disposition: inline; filename='. $filename);
        echo $icsBody;
    }
}

