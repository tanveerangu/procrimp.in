@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="float-start">Product Catelogs</h3>
                <div class="float-end"><a href="{{ route('admin.productCatelogs.create') }}"
                        class="btn btn-dark btn-sm">Create</a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>title</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productCatelogs as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><img src="{{ asset($item->image) }}" alt="{{ $item->title }}" width="100px" /></td>
                                <td>{{ $item->title }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.productCatelogs.edit', $item->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.productCatelogs.delete', $item->id) }}"
                                        onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $productCatelogs->links() }}
            </div>
        </div>
    @endsection
