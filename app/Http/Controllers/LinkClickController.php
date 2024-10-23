<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LinkClick;

class LinkClickController extends Controller
{
    public function trackClick(Request $request)
    {
        $linkClick = new LinkClick(); 
        $linkClick->link_name = $request->input('link_name');
        $linkClick->user_ip = $request->ip();
        $linkClick->save();

        return response()->json(['message' => 'Link click recorded successfully.']);
    }
}
 