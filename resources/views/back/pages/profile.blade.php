@extends('back.layouts.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Profile | Darab')
@section('pagePart', isset($pagePart) ? $pagePart : 'Profile')
@section('content')

<livewire:profile />

@endsection