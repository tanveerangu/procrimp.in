@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="float-start">Infrastructures</h3>
                <div class="float-end"><a href="{{ route('admin.infrastructures.create') }}"
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
                        @foreach ($infrastructures as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><img src="{{ asset('infrastructure-images/' . $item->image) }}" alt="Image"
                                        class="img-fluid" width="100px" style="object-fit:cover;" /></td>
                                <td>{{ $item->title }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.infrastructures.edit', $item->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.infrastructures.delete', $item->id) }}"
                                        onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $infrastructures->links() }}
            </div>
        </div>
    @endsection
