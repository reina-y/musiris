<title>Musiris</title>
    <x-app-layout>
        <meta name="csrf-token" content="{{ csrf_token() }}">
         <link rel="styleSheet" href="{{ asset('/css/index.css') }}">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
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
                <div class="swiper">
                    <div class="swiper-wrapper">
                    @foreach($post->images as $image)
                    <div class="swiper-slide">
                        <img src="{{ $image->image_url }}" alt="画像が読み込めません。"/>
                    </div> 
                    @endforeach
                    </div>
                    <div class="swiper-pagenation"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-scrollbar"></div>
                </div>
                <p class="instruments">{{ $post->instruments }}</p>
                <p>{{ $post->body }}</p>
                <div class="button">
                    @auth
                    @if (!$post->isLikedBy(Auth::user()))
                        <span class="likes">
                            <i class="fas fa-heart like-toggle" data-post-id="{{ $post->id }}"></i>
                            <span class="like-counter">{{$post->likes_count}}</span>
                        </span>
                    @else
                        <span class="likes">
                            <i class="fas fa-heart heart like-toggle liked" data-post-id="{{ $post->id }}"></i>
                            <span class="like-counter">{{$post->likes_count}}</span>
                        </span>
                    @endif
                    @endauth
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
            <div class="paginate">
                {{ $posts->links() }}
            </div>
        </div>
    <script>
    function deletePost(id){
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.swiper', {
            
              // If we need pagination
              pagination: {
                el: '.swiper-pagination',
              },
            
              // Navigation arrows
              navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },
            
              // And if we need scrollbar
              scrollbar: {
                el: '.swiper-scrollbar',
              },
            });
        </script>
</x-app-layout>