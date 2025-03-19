@extends('layouts.main')
@section('content')
    <div class="w-[500px] border rounded-[5px] p-3">
        <form action="{{route('post.filter')}}" method="get" class="flex flex-col gap-3 mb-2">
            <label class="flex flex-col">Filter by title:
                <input type="text"
                       name="title"
                       placeholder="title"
                       class="border rounded-[5px] p-1 pl-2 pr-2"
                       value="{{$data['title'] ?? null}}"
                >
                @error('title')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </label>
            <label class="flex flex-col">Filter by content:
                <input type="text"
                       name="content"
                       placeholder="content"
                       class="border rounded-[5px] p-1 pl-2 pr-2"
                       value="{{$data['content'] ?? null}}"
                >
                @error('content')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </label>
            <label class="mb-3">Filter by category:
                <select class="ml-3" name="category_id">
                    <option value="">none</option>
                    @foreach($categories as $category)
                        <option
                            @if(isset($data['category_id']))
                                {{ $data['category_id'] == $category->id ? 'selected' : '' }}
                            @endif
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </label>
            <button type="submit"
                    class="p-2 w-fit pl-5
                    pr-5 bg-blue-500 text-white
                    rounded-[10px] font-semibold
                    cursor-pointer"
            >Filter</button>
        </form>
        <ul> Posts:
            @foreach($posts as $post)
                <li class="mb-2 mt-2">
                    <a href="{{ route('post.show', $post->id) }}">{{$post->id}}. Title: {{$post->title}}</a>
                </li>
            @endforeach
        </ul>
        <div class="flex flex-row mt-3">
            <a href="{{route('post.index')}}"
               class="mr-5 p-2 pl-5 pr-5 bg-blue-500 text-white rounded-[10px] font-semibold">Back to posts</a>
        </div>
    </div>
    <div class="w-[500px] p-3">{{$posts->withQueryString()->links()}}</div>
@endsection
