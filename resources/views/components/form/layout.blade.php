@props([
    'title' => '',
    'method' => '',
    'action' => ''
])
@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="{{ $method }}" action="{{ $action }}" enctype="multipart/form-data">
                @csrf
                <div class="card mb-4">
                    <h5 class="card-header">{{ translate($title) }}</h5>
                    <div class="card-body">
                        <x-alerts></x-alerts>
                        {{ $slot }}
                    </div>
                    <div class="card-footer text-end" >
                        <button type="submit" class="btn btn-primary">{{ translate("Save") }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
