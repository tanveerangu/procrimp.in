@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="float-start">Edit Page</h3>
                <div class="float-end"><a href="{{ route('admin.pages.index') }}" class="btn btn-dark btn-sm">Back</a>
                </div>
            </div>
            <div class="card-body">
                <x-larastrap::form formview="vertical" action="{{ route('admin.pages.update',$id) }}"
                                   buttons_align="start"
                                   :buttons="[['label' => 'Update', 'color' => 'warning']]" :obj="$page">
                    @include('admin.pages.form')
                </x-larastrap::form>
            </div>
        </div>
    </div>

@endsection
