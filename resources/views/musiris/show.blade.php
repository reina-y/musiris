    <title>Musiris</title>
    <x-app-layout>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="styleSheet" href="{{ asset('/css/show.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
            <x-slot name="header">
                <h1 class="title">{{ $post->title }}</h1>
                <a class='userName' href='/user/{{ $post->user->id }}'>{{ $post->user->name }}</a>
                @if($post->user->id == Auth::id())
                    <a class="edit" href="/posts/{{ $post->id }}/edit">編集</a>
                @endif
            </x-slot>
        <div class="content">
            <div class="content__post">
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
                <p class='instruments'>{{ $post->instruments }}</p>
                <p class='body'>{{ $post->body }}</p>
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
                </div>    
            </div>
        </div>
        <div class="footer">
                <div class="comments">
                <br>
                <p class="cmt">コメント一覧</p>
                @foreach ($post->comments as $comment)
                <div class='comment'>
                    <a class='cmt_user-Name' href='/user/{{ $post->user->id }}'>{{ $comment->user->name }}</a>
                    <p class="cmt_body">{{ $comment->body }}</p>
                    @if($comment->movie_url !== null)
                    <video width='320' hight='180' controls preload="metadata" src="{{ $comment->movie_url }}"></video>
                    @endif
                </div>

                @endforeach
            </div>
            <div class="post_Comments">
                <form action="/posts/{{ $post->id }}/comments"  method="post" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <p>【演奏動画を添付する】</p>
                    <input type="file" name="movie_url" value="演奏動画">
                    <br>
                    <textarea type="textarea" name="body" placeholder="コメントする"></textarea>
                    <button class='submit_btn' type="submit">
                        <i class="fas fa-paper-plane purple-color"></i>
                    </button>
                </form>
            </div>
            <div class="back_index">
                <a href="/">投稿一覧に戻る</a>
            </div>
        </div>
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
  