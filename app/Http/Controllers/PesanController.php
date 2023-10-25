<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public static function send(Request $request)
    {
        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        return Pesan::create($data);
    }
}
