@extends('back.layouts.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Cabinet | Darab')
@section('pagePart', isset($pagePart) ? $pagePart : 'Cabinet')
@section('content')

<div class="overflow-x-auto">

    <a target="_blank" href="/cabinet_add"><button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-3 mb-3 rounded">Add Cabinet</button></a>
    <livewire:cabinet-show />
    
</div>

@endsection