<title>Musiris</title>
    <x-app-layout>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
        <link rel="styleSheet" href="{{ asset('/css/likedIndex.css') }}">
        <div class="posts">
            @foreach($likedPosts as $like)
            <div class='post'>
                    <a class="userName" href="/user/{{ $like->user->id }}">{{ $like->user->name }}</a><br>
                    <a class="title" href="/post/{{ $like->post->id }}">{{ $like->post->title }}</a>
                <div class="swiper">
                    <div class="swiper-wrapper">
                    @foreach($like->post->images as $image)
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
                <p class="instruments">{{ $like->post->instruments }}</p>
                <p class="body">{{ $like->post->body }}</p>
            </div>    
            @endforeach
        </div>
        <div class="paginate">
            {{ $likedPosts->links() }}
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