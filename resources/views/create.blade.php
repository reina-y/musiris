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
                Create Post
            </x-slot>
        <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <p>TITLE</p>
                <input type="text" name="post[title]" value="{{ old('post.title') }}"/>
                
            </div>
            <div class="image">
                <br><p>SCORES</p>
                <input type="file" name="image"/>
            </div>
            <div class="instruments">
                <br><p>INSTRUMENTS</p>
                <input type="text" name="post[instruments]" value="{{ old('post.instruments') }}"/>
            </div>
            <div class="body">
                <br><p>COMMENTS</p>
                <textarea type="textarea" name="post[body]">{{ old('post.body') }}</textarea>
            </div>
            <input type="submit" value="POST"/>
        </form>
        <br><a href="/">TOPに戻る</a>
        </x-app-layout>
    </body>        
</html>            