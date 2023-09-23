<title>Musiris</title>
            <x-app-layout>
                <link rel="styleSheet" href="{{ asset('/css/user.css') }}">
                <x-slot name="header">
                    <div class="userName">
                        {{ $users->name }}
                    </div>
                 </x-slot>
                    <div class="posts">
                        @foreach($posts as $post)
                        <div class="post">
                            <a class="title" href="/post/{{ $post->id }}">{{ $post->title }}</a>
                            <div class="images">
                            @foreach($post->images as $image)
                             <img width="900" height="1600" src="{{ $image->image_url }}" alt="画像が読み込めません。"/>
                            @endforeach 
                            </div>
                            <p class="instruments">{{ $post->instruments }}</p>
                        </div>    
                        @endforeach
                    </div>
            </x-app-layout>