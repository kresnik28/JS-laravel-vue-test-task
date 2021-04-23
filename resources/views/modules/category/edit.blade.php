@extends('layouts.app')
@section('title')
    Edit category
@endsection
@section('content')
    <category-form :id="{{$categoryId}}" :edit="true"></category-form>
@endsection
