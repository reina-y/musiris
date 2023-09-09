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
                {{ $post->title }}
            </x-slot>
        <div class="content">
            <div class="content__post">
                <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                <p>{{ $post->instruments }}</p>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/posts/{{ $post->id }}/edit">編集</a>
            <a href="/">TOPに戻る</a>
        </div>
        
    </x-app-layout>
    </body>
</html>    