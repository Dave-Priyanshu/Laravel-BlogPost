<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function show()
    {
        // Example code lines to display
        $lines = [
            'function helloWorld() {',
            '    console.log("Hello, World!");',
            '}',
            '',
            'helloWorld();',
            'priyanshu()',
            
        ];

        return view('editor', compact('lines'));
    }
}
