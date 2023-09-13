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
                <div class="images">
                    @foreach($post->images as $image)
                     <img src="{{ $image->image_url }}" alt="画像が読み込めません。"/>
                    @endforeach 
                </div>
                <p>{{ $post->instruments }}</p>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div class="footer">
            @if($post->user->id == Auth::id())
            <a href="/posts/{{ $post->id }}/edit">編集</a>
            @endif
                <div class="comments">
                <p>コメント一覧</p>
                @foreach ($post->comment as $comments)
                <div class='post'>
                    <p>{{ $comments->user->name }}</p>
                    <p>{{ $comments->body }}</p>
                    <video src="{{ $comments->movie_url }}"></video>
                </div>    
                @endforeach
            </div>
            <div class="post_Comments">
                <p>コメントする</p>
                <form action="/posts/{{ $post->id }}/comments"  method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="body">
                    <input type="file" name="movie_url"><br>
                    <button type="submit">送信</button>
                </form>
            </div>
            
            <a href="/">TOPに戻る</a>
        </div>
        
    </x-app-layout>
    </body>
</html>    