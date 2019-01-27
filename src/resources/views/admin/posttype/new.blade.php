@extends('cms::admin.layout')

@section('content')

    {{ Form::open(["route"  => "admin.pages.new.post", 'method' => 'post']) }}

        {{ Form::token() }}
        {{ Form::label("title", "Title : ") }}
        {{ Form::text("title", null) }}<br>

        {{ Form::label("slug", "Slug : ") }}
        {{ Form::text("slug", null) }}<br>

        {!! $fields !!}

        {{ Form::submit("Ok") }}

    {{ Form::close() }}
@stop