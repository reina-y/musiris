<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Musiris</title>
    </head>
    <body>
    <x-app-layout>
        <x-slot name="header">
            Scores
        </x-slot>   
        <div class='posts'>
                @foreach ($posts as $post)
                <div class='post'>
                    <h3 class='title'>
                        <a href="/post/{{ $post->id }}">{{ $post->title }}</a>
                    </h3>
                    <p>{{ $post->user->name }}</p>
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                    <p>{{ $post->instruments }}</p>
                    <p>{{ $post->body }}</p>
                </div>
                @endforeach
        </div>
    </x-app-layout>    
    </body>
</html>