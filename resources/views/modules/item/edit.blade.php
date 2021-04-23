@extends('layouts.app')
@section('title')
    Edit item
@endsection
@section('content')
    <item-form :id="{{$itemId}}" :edit="true"></item-form>
@endsection
