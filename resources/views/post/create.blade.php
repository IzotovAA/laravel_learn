@extends('layouts.main')
@section('content')
    <form action="{{route('post.store')}}" method="post" class="w-[500px] block border p-5 rounded-[5px]">
        @csrf
        <label class="flex flex-col mb-3">Title
            <input
                value="{{old('title')}}"
                type="text" name="title" placeholder="Title" class="border mt-1 pl-2 p-1 rounded-[5px]">
            @error('title')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </label>
        <label class="flex flex-col mb-3">Content
            <textarea name="content" placeholder="Content" class="border mt-1 pl-2 p-1 h-[100px] rounded-[5px]">{{old('post_content')}}</textarea>
            @error('content')
            <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </label>
        <label class="flex flex-col mb-3">Image
            <input
                value="{{old('image')}}"
                type="text" name="image" placeholder="Image" class="border mt-1 pl-2 p-1 rounded-[5px]">
            @error('image')
            <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </label>
        <div class="flex flex-col mb-3">
            <label class="mb-3">Select category:
                <select class="ml-3" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{ old('category_id') ==  $category->id ? ' selected' : ''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </label>
            <label class="flex">Select tags:
                <select multiple class="ml-3" name="tags_id[]">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <button class="w-[150px] border p-1 bg-blue-500 text-white rounded-[10px] font-semibold cursor-pointer" type="submit" >Create</button>
    </form>
@endsection
