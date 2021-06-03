<?php

namespace App\Facades\Accessors;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class SeoInit
{
    public function list($title,$desc,$url,$image="",$tags=[]) {
        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::addMeta('article:section', $title, 'property');
        SEOMeta::addKeyword($tags);

        OpenGraph::setDescription($desc);
        OpenGraph::setTitle($title);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'ar-eg');
        OpenGraph::addProperty('locale:alternate', ['ar-eg', 'en-us']);

        OpenGraph::addImage($image);
        OpenGraph::addImage(['url' => $image, 'size' => 300]);
        OpenGraph::addImage($image, ['height' => 300, 'width' => 300]);
        
        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Article');
        JsonLd::addImage($image);
    }

    public function one($title,$desc,$url,$date="",$image="",$tags=[]) {
        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::addMeta('article:published_time', $date, 'property');
        SEOMeta::addMeta('article:section', $title, 'property');
        SEOMeta::addKeyword($tags);

        OpenGraph::setDescription($desc);
        OpenGraph::setTitle($title);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'ar-eg');
        OpenGraph::addProperty('locale:alternate', ['ar-eg', 'en-us']);

        OpenGraph::addImage($image);
        OpenGraph::addImage(['url' => $image, 'size' => 300]);
        OpenGraph::addImage($image, ['height' => 300, 'width' => 300]);
        
        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Article');
        JsonLd::addImage($image);
    }
}