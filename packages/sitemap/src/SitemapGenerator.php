<?php

namespace Packages\Sitemap\Src;

use DateTime;
use DOMDocument;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class SitemapGenerator
{
    protected $xml;

    public function __construct()
    {
        $this->xml = new \XMLWriter();
        $this->xml->openMemory();
        $this->xml->startDocument('1.0', 'UTF-8');
        $this->xml->startElement('urlset');
        $this->xml->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
    }

    public function addUrl($url, $lastModified = null, $changeFrequency = null, $priority = null)
    {
        $this->xml->startElement('url');
        $this->xml->writeElement('loc', '<a href="'.$url.'"></a>');
        if ($lastModified) {
            $this->xml->writeElement('lastmod', $lastModified->format(DateTime::ATOM));
        }
        if ($changeFrequency) {
            $this->xml->writeElement('changefreq', $changeFrequency);
        }
        if ($priority) {
            $this->xml->writeElement('priority', $priority);
        }
        $this->xml->endElement();
    }

    public function generateXml(): void
    {
        $this->xml->endElement();
        $this->xml->endDocument();

        $data = $this->xml->outputMemory();
        $dom = new DOMDocument();
        $dom->loadXML($data);
        if(! File::exists(public_path() . '/sitemap.xml')) {
            fopen(public_path() . '/sitemap.xml', 'w+');
            $dom->save(public_path() . '/sitemap.xml');
        }
        $dom->save(public_path() . '/sitemap.xml');
        // return Response::make($this->xml->outputMemory(), 200, [
        //     'Content-Type' => 'application/xml',
        // ]);
    }

    public static function xinchao()
    {
        return 'xinchao';
    }
}
