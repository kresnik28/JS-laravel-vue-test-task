@extends('layouts.app')
@section('title')
    Items List
@endsection

@section('content')
    <a href="{{route('item.create')}}">Create New</a>
    <item-list>
    </item-list>
@endsection
