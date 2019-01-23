@extends('cms::admin.layout')

@section('content')
    <h1>{{$page->title}}</h1>

    {{ Form::open(["route"  => ["admin.pages.edit.post", $page->id]]) }}
        {{ Form::text("slug", $page->slug) }}
    {{ Form::close() }}
@stop