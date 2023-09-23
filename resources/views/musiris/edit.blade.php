<title>Musiris</title>
             <x-app-layout>
                 <link rel="styleSheet" href="{{ asset('/css/edit.css') }}">
                 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
                 <x-slot name="header">
                    投稿編集    
                 </x-slot>
                 <div class="body">
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
                        <div class="sbm_btn">
                            <br>
                            <button type="submit">投稿する</button>
                            <i class="fas fa-paper-plane purple-color"></i>
                        </div>
                    </form>
                </div>
                <div class="back_index">
                    <br>
                    <a href="/">投稿一覧に戻る</a>
                </div>
        </x-app-layout>
 