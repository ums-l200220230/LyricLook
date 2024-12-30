@props(['categories'])
<div class="container ml-64 bg-[#23262D] rounded-xl p-3 w-auto mr-2 ">
    <div class="text-white">
        <div class="font-semibold text-2xl">Categories</div>
        <div class="grid grid-cols-4 gap-4 mt-4">
            @foreach ($categories['categories']['items'] as $cate)
                <a href="{{route('song',['id' => $cate['id']])}}" class="bg-[#2F343D] hover:bg-[#4F5968] rounded-lg p-4 items-center">
                    <div class="text-center font-medium">{{$cate['name']}}</div>
                </a>
            @endforeach
        </div>
    </div>
</div>
