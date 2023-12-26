<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SEO;
use SEOMeta;
use OpenGraph;
class PageController extends Controller
{
    public function dmca()
    {
        SEOMeta::setTitle('Seataku - DMCA');
        SEOMeta::setDescription('Seataku - DMCA');
        OpenGraph::setDescription('Seataku - DMCA');
        OpenGraph::setTitle('Seataku - DMCA');
        return view('comics.pages.dmca');
    }

    public function privacyPolicy()
    {
        SEOMeta::setTitle('Seataku - Privacy Policy');
        SEOMeta::setDescription('Seataku - Privacy Policy');
        OpenGraph::setDescription('Seataku - Privacy Policy');
        OpenGraph::setTitle('Seataku - Privacy Policy');
        return view('comics.pages.privacypolicy');
    }
}
