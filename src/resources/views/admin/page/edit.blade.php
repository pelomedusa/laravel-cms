@extends('cms::admin.layout')

@section('content')
    <h1>{{$page->title}}</h1>

    {{ Form::open(["route"  => ["admin.pages.edit.post", $page->id], 'method' => 'post']) }}

    {{  Form::token() }}
    {{ Form::label("title", "Title : ") }}
    {{ Form::text("title", $page->title) }}<br>

    {{ Form::label("slug", "Slug : ") }}
    {{ Form::text("slug", $page->slug) }}<br>

    {{ \Pelomedusa\Cms\Controllers\FieldController::renderFields($page) }}

    {{ Form::submit("Ok") }}
    {{ Form::close() }}
@stop