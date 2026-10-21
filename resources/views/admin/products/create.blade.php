@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="float-start">Create Product</h3>
                <div class="float-end"><a href="{{ route('admin.products.index') }}" class="btn btn-dark btn-sm">Back</a></div>
            </div>
            <div class="card-body">
                <x-larastrap::form formview="vertical" action="{{ route('admin.products.store') }}" buttons_align="start"
                                   :buttons="[['label' => 'Create', 'color' => 'primary']]">
                    @include('admin.products.form')
                </x-larastrap::form>
            </div>
        </div>
    </div>

@endsection
