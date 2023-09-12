
<x-app-layout> 
     <link rel="styleSheet" href="{{ asset('/css/index.css') }}">
    <x-slot name="header">
        投稿一覧
    </x-slot>
    <div class='posts'>
            @foreach ($posts as $post)
            <div class='post'>
                <h3 class='title'>
                    <a href="/post/{{ $post->id }}">{{ $post->title }}</a>
                </h3>
                <a class="userName" href="/user/{{ $post->user->id }}">{{ $post->user->name }}</a>
                <div class="images">
                    @foreach($post->images as $image)
                     <img src="{{ $image->image_url }}" alt="画像が読み込めません。"/>
                    @endforeach 
                </div>
                <p class="instruments">{{ $post->instruments }}</p>
                <p>{{ $post->body }}</p>
            
                <div class="button">
                    @if($post->islike($post))
                        <div class="likes">
                            <button class="like_Button liked" data-post-id="{{ $post->id }}">いいね解除</button>
                        </div>
                    @else
                        <div class="likes">
                            <button class="like_Button" data-post-id="{{ $post->id }}">いいね</button>
                        </div>
                    @endif
                    @if($post->user->id == Auth::id())
                        <div class="delete_Button">
                            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deletePost({{ $post->id }})">削除</button>
                            </form>
                        </div>
                    @endif    
                </div>
            </div>
            @endforeach
                
            
    </div>
    <script>
    function deletePost(id){
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
    </script>
</x-app-layout>