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
                    編集    
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
                        <p class="title">TITLE</p>
                        <input type='text' name='post[title]' value="{{ old('post.title',$post->title) }}">
                        <br><p class="image">SCORES</p>
                        <input type='file' name='image'>
                        <br><p class="instruments">INSTRUMENTS</p>
                        <input type='text' name='post[instruments]' value="{{ old('post.instruments',$post->instruments) }}">
                        <br><p>COMMENT</p>
                        <textarea type="textarea" name="post[body]">{{ old('post.body',$post->body) }}</textarea>
                        <br><input type="submit" value="POST">
                    </form>
                <br><a href="/">TOPに戻る</a>
             </x-app-layout>
        </body>
</html>