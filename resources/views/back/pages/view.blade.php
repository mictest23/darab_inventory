@extends('back.layouts.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'View Record | Darab')
@section('pagePart', isset($pagePart) ? $pagePart : 'View Record')
@section('content')

<div class="overflow-x-auto">
  <livewire:table-view />
</div>

@endsection