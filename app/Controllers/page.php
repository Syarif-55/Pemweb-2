<?php namespace App\Controllers;


class Page extends BaseController
{
    public function about()
    {
        echo "about page";
    }

    public function contact()
{
    echo "contact page";
}
    public function faqs()
{
    echo "faqs page";
}
public function tos()
    {
        echo "Halaman term of service ";
    }
    
    public function biodata()
    {
        echo"Nama : Syarif H<br>";
        echo"Alamat : Janti Jogoroto Jombang<br>";
        echo"Umur : 23 Tahun<br>";
        echo"Warga kenegaraan : Korea";
    }
    
}
