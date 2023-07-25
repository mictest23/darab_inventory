@extends('back.layouts.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Add Record | Darab')
@section('pagePart', isset($pagePart) ? $pagePart : 'Add Record')
@section('content')

<livewire:add-record-form />

@endsection