<?php

namespace Acrnogor\ICalExporter;

use Twig_Environment;
use ICalExporter\Entity\ICalExporterInterface;

class ICalExporter
{
    /**
     * ICalExporter constructor.
     * @param Twig_Environment $twig
     */
    public function __construct(Twig_Environment $twig)
    {
        $twig->getLoader()->addPath(__DIR__ .'/View');
        $this->twig = $twig;
    }

    public function getICalDataAsString(array $iCalItems)
    {
        $icsBody = '';

        // verify all items are importing the correct interface
        foreach ($iCalItems as $iCalItem) {
            if ( !($iCalItem instanceof ICalExporterInterface) ) {
                throw new \InvalidArgumentException('All iCalItems must implement ICalExporterInterface');
            }
        }

        try {
            $icsBody = $this->twig->render('ical-template.twig', [
                'items' => $iCalItems
            ]);
        } catch (\Exception $e) {
            // fuck off :-)
        }
        return $icsBody;
    }

    /**
     * Download data in Ical format
     * @param ICalExporterInterface[] $iCalItems
     * @param string $filename
     * @throws \InvalidArgumentException when not all objects in array are implementing the required interface
     */
    public function downloadAsICal(array $iCalItems, $filename)
    {
        $icsBody = $this->getICalDataAsString($iCalItems);

        header('Content-type: text/calendar; charset=utf-8');
        header('Content-Disposition: inline; filename='. $filename);
        echo $icsBody;
    }
}

