<title>Musiris</title>
        <x-app-layout>
            <link rel="styleSheet" href="{{ asset('/css/create.css') }}">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <x-slot name="header">
            <h1>新規投稿</h1>
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
        <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <p>タイトル</p>
                <input type="text" name="post[title]" value="{{ old('post.title') }}">
            </div>
            <div class="image">
                <br>
                <p>楽譜</p>
                <input type="file" name="image[]" multiple>
            </div>
            <div class="instruments">
                <br><p>楽器編成</p>
                <input type="text" name="post[instruments]" value="{{ old('post.instruments') }}">
            </div>
            <div class="post_body">
                <br><p>本文</p>
                <textarea type="textarea" name="post[body]">{{ old('post.body') }}</textarea>
            </div>
            <div class="sbm_btn">
                <button type="submit">投稿する</button>
                <i class="fas fa-paper-plane blue-color"></i>
            </div>
        </form>
        </div>
        <br>
        <a class="back_index" href="/">ホームに戻る</a>
        </x-app-layout>
    </body>        
</html>            