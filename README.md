# Simple ICal Exporter library
requires Twig templating engine to render ICS files.

#### Installation:
```shell
composer require acrnogor/ical-exporter
```

#### Usage:

```php
// first, we need Twig environement
$loader = new Twig_Loader_Filesystem();
$twig   = new Twig_Environment($loader, [
    'cache' => __DIR__ . '/var/cache',
]);

// now create new ICalExporter object and download event items as ICS file
$filename = 'this-is-my-calendar.ics';
$icalExporter = new ICalExporter($twig);
$ice->downloadAsICal($items, $filename);
```

#### Or, if you just want ICS body as string/text:

```php
// you an either repeat Twig part or just use Dependency Injection (i.e. in Symfony) to inject twig to the class, then fetch it as a service
...

// now create new ICalExporter object and download event items as ICS file
$icalExporter = new ICalExporter($twig);
$icsText = $ice->getICalDataAsString($items);
echo $icsText;
```

#### Todo: 
- maybe implement a non twig version? Meh...

#### On packagist:
https://packagist.org/packages/acrnogor/ical-exporter