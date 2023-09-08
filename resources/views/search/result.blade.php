<x-app-layout>
    <x-slot name=header>
        "{{ request('query') }}"について{{ $searchResults->count() }} 件の検索結果がありました。
    </x-slot>
        <div class="">
            @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                @foreach($modelSearchResults as $searchResult)
                    <ul>
                        <li><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></li>
                        
                    </ul>
                @endforeach
            @endforeach
</div>
</x-app-layout>