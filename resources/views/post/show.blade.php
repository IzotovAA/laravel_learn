@extends('layouts.main')
@section('content')
    <div class="w-[500px] border rounded-[5px] p-3">
        <div class="mb-1"><span class="font-semibold">Post id:</span> {{$post->id}}</div>
        <div class="mb-1"><span class="font-semibold">Title:</span> {{$post->title}}</div>
        <div class="mb-1"><span class="font-semibold">Content:</span> {{$post->content}}</div>
        <div class="mb-1"><span class="font-semibold">Image:</span> {{$post->image}}</div>
        <div class="mb-1"><span class="font-semibold">Likes:</span> {{$post->likes}}</div>
        <div class="mb-1"><span class="font-semibold">Category:</span> {{$category->title}}</div>
        <div class="flex gap-2"><span class="font-semibold">Tags:</span>
            @foreach($tagsToShow as $tag)
                <div>{{$tag}}</div>
            @endforeach
        </div>
        <div class="flex flex-row mt-3">
            <a href="{{route('post.index')}}"
               class="mr-5 p-2 pl-5 pr-5 bg-blue-500 text-white rounded-[10px] font-semibold">Back to posts</a>
            <a href="{{route('post.edit', $post->id)}}"
               class="mr-5 p-2 pl-5 pr-5 bg-blue-500 text-white rounded-[10px] font-semibold">Edit</a>
            <form action="{{ route('post.destroy', $post->id) }}" method="post" class="">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="p-2 pl-5 pr-5 bg-blue-500 text-white rounded-[10px] font-semibold cursor-pointer">Delete
                </button>
            </form>
        </div>
    </div>
@endsection
