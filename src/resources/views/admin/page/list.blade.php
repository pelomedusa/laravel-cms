@extends('cms::admin.layout')

@section('content')
    <table style="width: 100%">
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($pages as $page)
            <tr>
                <td>{{ $page->title }}</td>
                <td>{{ $page->slug }}</td>
                <td><a href="{{ route("admin.pages.edit", ["id" => $page->id]) }}">edit</a></td>
                <td><a href="{{ route("admin.pages.edit", ["id" => $page->id]) }}">view</a></td>
            </tr>
        @endforeach
    </table>
@stop