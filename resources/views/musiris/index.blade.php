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
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                </form>
                @endforeach
        </div>
    </x-app-layout>    
    </body>
    <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
    </script>
</html>