<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\TextSyetem;
use Illuminate\Http\Request;

class SendTextController extends Controller
{
    public function index(){
        return view('send-text');
    }

    public function proces(){

    }
}
