<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Contracts\Support\Renderable;

class SiteController extends Controller
{
    /**
     * @return Renderable
     */
    public function suggestedServices(): Renderable
    {
        return view('site.suggested-services');
    }
}
