@extends('layouts.app')
@section('title')
    Categories List
@endsection

@section('content')
    <a href="{{route('category.create')}}">Create New</a>
    <category-list>
    </category-list>
@endsection
