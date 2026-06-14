@extends('errors.layout')

@section('title', 'Page Expired')
@section('code', '419')
@section('heading', 'Session Timeout')
@section('description', 'The page security token has expired because you were away for a bit too long. Don\'t worry, refreshing or navigating back home fixes this instantly.')

@section('illustration')
<svg class="w-32 h-32 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
@endsection
