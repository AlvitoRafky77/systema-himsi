<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak; // Menggunakan model Kontak sesuai dengan yang Anda gunakan
use Illuminate\Http\Request; // Import Request facade
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect; // Import Redirect facade
use Illuminate\Support\Facades\Log; // Ini mungkin tidak lagi diperlukan jika destroy dipindahkan, tapi biarkan saja untuk index

class ContactController extends Controller
{
    /**
     * Display a listing of the contact messages.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Fetch all contact messages from the database, ordered by creation date descending
        $contacts = Kontak::latest()->get(); // Menggunakan Kontak::latest() untuk mengurutkan terbaru

        // Return the view with the contact messages data
        return view('admin.contacts.index', compact('contacts'));
    }

    
}
