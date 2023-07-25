@extends('back.layouts.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Add Admin | Darab')
@section('pagePart', isset($pagePart) ? $pagePart : 'Add Admin')
@section('content')

<livewire:add-user-form />

@endsection