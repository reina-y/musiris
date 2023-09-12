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
                    投稿編集    
                 </x-slot>
                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                         @foreach ($errors->all() as $error)
                            <li class="error" style="color:red">{{ $error }}</li>
                         @endforeach
                        </ul>
                    </div>
                 @endif
                    <form action="/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <p class="title">タイトル</p>
                        <input type='text' name='post[title]' value="{{ old('post.title',$post->title) }}">
                        <br><p class="image">楽譜</p>
                        <input type='file' name='image[]' multiple>
                        <br><p class="instruments">楽器編成</p>
                        <input type='text' name='post[instruments]' value="{{ old('post.instruments',$post->instruments) }}">
                        <br><p>本文</p>
                        <textarea type="textarea" name="post[body]">{{ old('post.body',$post->body) }}</textarea>
                        <br><input type="submit" value="投稿する">
                    </form>
                <br><a href="/">TOPに戻る</a>
             </x-app-layout>
        </body>
</html>