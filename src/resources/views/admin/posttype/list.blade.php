@extends('cms::admin.layout')

@section('content')
    <h1>{{$title}}</h1>
    <table style="width: 100%">
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td><a href="{{ route("admin.pages.edit", ["id" => $post->id]) }}">edit</a></td>
                <td><a href="{{ route("admin.pages.edit", ["id" => $post->id]) }}">view</a></td>
            </tr>
        @endforeach
    </table>
@stop