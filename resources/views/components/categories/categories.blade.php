@props(['categories'])
<div class="container ml-64 bg-[#23262D] rounded-xl p-3 w-auto mr-2 ">
    <div class="text-white">
        <div>Categories</div>
        <div class="grid grid-cols-2 gap-4 mt-2">
            @foreach ($categories['categories']['items'] as $cate)
                <a href="{{route('song',['id' => $cate['id']])}}" class="bg-[#313237] rounded-lg p-4 items-center">
                    {{$cate['name']}}
                </a>
            @endforeach
        </div>
    </div>
</div>