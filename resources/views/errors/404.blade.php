@extends('errors.layout')

@section('title', 'Page Not Found')
@section('code', '404')
@section('heading', 'Lost in Space?')
@section('description', "The page you are looking for might have been moved, deleted, or perhaps it never existed in our system architecture. Let's get you back on track.")

@section('illustration')
<svg class="w-32 h-32 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
@endsection
