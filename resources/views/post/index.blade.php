@extends('layouts.main')
@section('content')
    <div class="w-[500px] border rounded-[5px] p-3">
        <ul> Posts:
            @foreach($posts as $post)
                <li class="mb-2 mt-2">
                    <a href="{{ route('post.show', $post->id) }}">{{$post->id}}. Title: {{$post->title}}</a>
                </li>
            @endforeach
        </ul>
        <div class="mt-5 mb-3">
            <a href="{{ route('post.create') }}"
               class="w-[300px] border p-2 pl-5 pr-5 bg-blue-500 text-white rounded-[10px] font-semibold">Create new
                post</a>
            <a href="{{ route('post.filter') }}"
               class="w-[300px] border p-2 pl-5 pr-5 ml-2 bg-blue-500 text-white rounded-[10px] font-semibold">Filter</a>
        </div>
    </div>
    <div class="w-[500px] p-3">{{$posts->links()}}</div>
@endsection
