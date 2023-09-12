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
                    {{ $users->name }}
                 </x-slot>
                    <div class="user_Posts">
                        @foreach($posts as $post)
                            <a class="title" href="/post/{{ $post->id }}">{{ $post->title }}</a>
                            <div class="images">
                            @foreach($post->images as $image)
                             <img src="{{ $image->image_url }}" alt="画像が読み込めません。"/>
                            @endforeach 
                            </div>
                            <p class="instruments">{{ $post->instruments }}</p>
                        @endforeach
                    </div>
            </x-app-layout>   
        </body>
</html>