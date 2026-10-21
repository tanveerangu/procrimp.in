@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <x-larastrap::form formview="vertical" action="{{ route('admin.setting-store') }}" buttons_align="start"
                    :buttons="[['label' => 'Update', 'color' => 'warning']]" :obj="$setting">

                    <div class="row">
                        <div class="col-md-4">
                            <x-larastrap::text name="website_name" label="Website Name" placeholder="Website Name" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <x-larastrap::file id="logo-image" name="website_logo" label="Website Logo" />
                            @if ($setting->website_logo)
                                <img src="{{ asset('setting-images/' . ($setting->website_logo ?? '')) }}" alt="Images"
                                    class="img-fluid w-25" />
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <x-larastrap::file id="favicon" name="favicon" label="Favicon" />
                            @if ($setting->favicon)
                                <img src="{{ asset('setting-images/' . ($setting->favicon ?? '')) }}" alt="Images"
                                    class="img-fluid w-25" />
                            @endif
                        </div>
                        <div class="col-md-4">
                            <x-larastrap::text name="phone" label="Phone Number" placeholder="Phone Number" />
                        </div>
                        <div class="col-md-4">
                            <x-larastrap::text name="email" label="Email" placeholder="Email" />
                        </div>
                        <div class="col-md-12">
                            <x-larastrap::text name="address" label="Address"
                                placeholder="Address" />
                        </div>
                        <div class="col-md-12">
                            <x-larastrap::text name="map" label="Google Iframe" placeholder="Google Iframe" />
                        </div>
                    </div>
                </x-larastrap::form>
                <hr class="mt-5">
                <h4 class="mb-4">Change Password</h4>
                <x-larastrap::form formview="vertical" action="{{ route('admin.change-password') }}" buttons_align="start"
                    :buttons="[['label' => 'Change Password', 'color' => 'dark']]">
                    <div class="row">
                        <div class="col-md-4">
                            <x-larastrap::password name="old_password" label="Old Password" placeholder="Old Password" />
                        </div>
                        <div class="col-md-4">
                            <x-larastrap::password name="new_password" label="New Password" placeholder="New Password" />
                        </div>
                        <div class="col-md-4">
                            <x-larastrap::password name="confirm_password" label="Confirm Password" placeholder="Confirm Password" />
                        </div>
                    </div>
                </x-larastrap::form>
            </div>
        </div>
    </div>
@endsection
