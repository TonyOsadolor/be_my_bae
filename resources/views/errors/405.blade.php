@extends('errors.layout')

@section('title', 'Method Not Allowed')
@section('code', '405')
@section('heading', 'Oops! Method Not Allowed')
@section('description', "The HTTP method used for this request is not allowed. Please check the request method and try again.")

@section('illustration')
<svg class="w-32 h-32 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
@endsection
