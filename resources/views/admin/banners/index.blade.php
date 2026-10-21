@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="float-start">Banner</h3>
                <div class="float-end"><a href="{{ route('admin.banner.create') }}" class="btn btn-dark btn-sm">Create</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $index => $item)
                            <tr>
                                <td>{{ ($banners->currentPage() - 1) * $banners->perPage() + $index + 1 }}</td>
                                <td><img src="{{ asset('banner-images/' . $item->image) }}" alt="Image" class="img-fluid"
                                        width="100px" /></td>
                                <td>{{ $item->title }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.banner.edit', $item->id) }}" class="btn btn-primary btn-sm"><i
                                            class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.banner.delete', $item->id) }}"
                                        onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $banners->links() }}
            </div>
        </div>
    @endsection
