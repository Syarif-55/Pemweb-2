<?php

namespace App\Controllers;

class Matkul extends BaseController
{
    public function MBD(): string
    {
        return view('Mbd');
    }
    public function MJK(): string
    {
        return view('Mjk');
    }   
    public function MP(): string
    {
        return view('Mp');
    }
    public function Sim(): string
    {
        return view('Sistem');
    }
}
