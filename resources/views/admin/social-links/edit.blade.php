@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="float-start">Edit Social Link</h3>
                <div class="float-end"><a href="{{ route('admin.social-links.index') }}" class="btn btn-dark btn-sm">Back</a>
                </div>
            </div>
            <div class="card-body">
                <x-larastrap::form formview="vertical" action="{{ route('admin.social-links.update',$id) }}"
                                   buttons_align="start"
                                   :buttons="[['label' => 'Update', 'color' => 'warning']]" :obj="$socialLink">
                    @include('admin.social-links.form')
                </x-larastrap::form>
            </div>
        </div>
    </div>

@endsection
