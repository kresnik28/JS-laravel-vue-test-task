@extends('layouts.app')
@section('title', 'Create Category')
@section('content')
    <a href="{{route('item.index')}}"><h2>Items List</h2></a>
    <a href="{{route('category.index')}}"><h2>Categories List</h2></a>
@endsection
