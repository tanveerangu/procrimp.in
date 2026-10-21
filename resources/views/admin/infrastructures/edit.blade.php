@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="float-start">Edit Infrastructure</h3>
                <div class="float-end"><a href="{{ route('admin.infrastructures.index') }}"
                        class="btn btn-dark btn-sm">Back</a>
                </div>
            </div>
            <div class="card-body">
                <x-larastrap::form formview="vertical" action="{{ route('admin.infrastructures.update', $id) }}"
                    buttons_align="start" :buttons="[['label' => 'Update', 'color' => 'warning']]" :obj="$infrastructure">
                    @include('admin.infrastructures.form')
                </x-larastrap::form>
            </div>
        </div>
    </div>
@endsection
