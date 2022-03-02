<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Post;
use App\Support\Seo;
use Database\Factories\PostFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\New_;

class webController extends Controller
{
    public function home()
    {
        $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();

        $head = $this->seo->render(env('APP_NAME') . ' - Home ',
            'Descrição teste',
            route('home'),
            asset('images/img_bg_1.jpg'));

        return view('front.home', [
            'head' => $head,
            'posts' => $posts
        ]);
    }

    public function courses()
    {
        $head = $this->seo->render(env('APP_NAME') . ' - Cursos ',
            'Cursos',
            route('course'),
            asset('images/img_bg_1.jpg'));

        return view('front.course', [
            'head' => $head
        ]);
    }

    public function blog()
    {

        $posts = Post::orderBy('created_at', 'DESC')->get();

        $head = $this->seo->render(env('APP_NAME') . ' - Blog ',
            'Descrição teste',
            route('blog'),
            asset('images/img_bg_1.jpg'));

        return view('front.blog', [
            'head' => $head,
            'posts' => $posts
        ]);
    }

    public function article($uri)
    {
        $post = Post::where('uri', $uri)->first();

        $head = $this->seo->render(env('APP_NAME') . $post->title,
            $post->subtitle,
            route('article', $post->uri),
            asset(\Illuminate\Support\Facades\Storage::url(\App\Support\Cropper::thumb($post->cover, 1200, 628))));

        return view('front.article', [
            'post' => $post
        ]);
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function sendMail(Request $request)
    {
        $data = [
            'reply_name' => $request->first_name . " " . $request->last_name,
            'reply_email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::send(new Contact($data));


        //        return new Contact($data);
//        var_dump($request->all());
    }
}
