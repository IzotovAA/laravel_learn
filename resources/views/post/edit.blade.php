@extends('layouts.main')
@section('content')
    <form action="{{route('post.update', $post->id)}}" method="post" class="w-[500px] block border rounded-[5px] p-5">
        @csrf
        @method('PATCH')
        <div class="mb-2">Post id: {{$post->id}}</div>
        <label class="flex flex-col mb-3">Title
            <input type="text" name="title" placeholder="Title" class="border mt-1 pl-2 p-1" value="{{$post->title}}">
        </label>
        <label class="flex flex-col mb-3">Content
            <textarea name="content" placeholder="Content"
                      class="border mt-1 pl-2 p-1 h-[100px]">{{$post->content}}</textarea>
        </label>
        <label class="flex flex-col mb-3">Image
            <input type="text" name="image" placeholder="Image" class="border mt-1 pl-2 p-1" value="{{$post->image}}">
        </label>
        <div class="mb-3">
            <label>Select category:
                <select class="ml-3" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{$category->id === $post->category_id ? ' selected' : ''}}
                            value="{{$category->id}}"
                        >{{$category->title}}</option>
                    @endforeach
                </select>
            </label>
            <label class="flex">Select tags:
                <select multiple class="ml-3" name="tags_id[]">
                    @foreach($tags as $tag)
                        <option
                            @if(in_array($tag->id, $tagsIdToSelect))
                                selected
                            @endif
                            value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <button class="w-[150px] border p-1 bg-blue-500 text-white rounded-[10px] font-semibold cursor-pointer"
                type="submit">Edit
        </button>
    </form>
@endsection
