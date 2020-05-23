<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;

class ViewFileController extends Controller
{
    public function pdfViewer()
{
  return View::make('pdfview.view');
}
}
