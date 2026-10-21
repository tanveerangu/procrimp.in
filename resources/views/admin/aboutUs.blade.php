@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="float-start">About Us</h3>
            </div>
            <div class="card-body">
                <x-larastrap::form formview="vertical" action="{{ route('admin.aboutUs.store') }}" buttons_align="start"
                                   :buttons="[['label' => 'Update', 'color' => 'warning']]" :obj="$aboutUs">
                    <div class="row">
                        <div class="col-md-6">
                            <x-larastrap::text name="title" label="Title" placeholder="Title"/>
                        </div>
                        <div class="col-md-6">
                            <x-larastrap::file name="image" label="Image" placeholder="Image"/>
                            @if($aboutUs->image)
                                <img src="{{ asset('aboutUs-images/'.$aboutUs->image) }}" alt="Image" class="img-fluid w-25"/>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <x-larastrap::textarea rows="4" name="description" label="Description" placeholder="Description"/>
                        </div>
                    </div>
                </x-larastrap::form>
            </div>
        </div>
    </div>
@endsection
