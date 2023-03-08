@extends('layouts.app')

@section('title', $project->title)

@section('content')
    <header>
        <h1 class="my-5">
            {{ $project->title }}
        </h1>
    </header>
@endsection
