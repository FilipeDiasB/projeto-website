<?php

namespace App\Http\Controllers;

use App\Support\Seo;
use Illuminate\Http\Request;

class webController extends Controller
{
    public function home()
    {
        $head = $this->seo->render(env('APP_NAME') . ' - Home ',
            'Descrição teste',
             route('home'),
            asset('images/img_bg_1.jpg'));

        return view('front.home', [
            'head' => $head
        ]);
    }

    public function courses()
    {
        $head = $this->seo->render(env('APP_NAME') . ' - Cursos ',
            'Cursos',
            route('courses'),
            asset('images/img_bg_1.jpg'));

        return view('front.courses', [
            'head' => $head
        ]);
    }

    public function blog()
    {
        $head = $this->seo->render(env('APP_NAME') . ' - Blog ',
            'Descrição teste',
            route('blog'),
            asset('images/img_bg_1.jpg'));

        return view('front.blog', [
            'head' => $head
        ]);
    }

    public function contact()
    {
        $head = $this->seo->render(env('APP_NAME') . ' - Contato ',
            'Descrição teste',
            route('contact'),
            asset('images/img_bg_1.jpg'));

        return view('front.contact', [
            'head' => $head
        ]);
    }
}
