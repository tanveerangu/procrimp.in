@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="float-start">Create Page</h3>
                <div class="float-end"><a href="{{ route('admin.pages.index') }}" class="btn btn-dark btn-sm">Back</a></div>
            </div>
            <div class="card-body">
                <x-larastrap::form formview="vertical" action="{{ route('admin.pages.store') }}" buttons_align="start"
                                   :buttons="[['label' => 'Create', 'color' => 'primary']]">
                    @include('admin.pages.form')
                </x-larastrap::form>
            </div>
        </div>
    </div>

@endsection
