@extends('back.layouts.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard | Darab')
@section('pagePart', isset($pagePart) ? $pagePart : 'Dashboard')
@section('content')

<livewire:dashboard />

@endsection