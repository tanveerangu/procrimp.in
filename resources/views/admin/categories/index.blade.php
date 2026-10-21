@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="float-start">Categories</h3>
                <div class="float-end"><a href="{{ route('admin.categories.create') }}"
                                          class="btn btn-dark btn-sm">Create</a></div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $index => $item)
                        <tr>
                            <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $index + 1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->slug }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.categories.edit',$item->id) }}"
                                   class="btn btn-primary btn-sm"><i
                                        class="fa fa-pencil"></i></a>
                                <a href="{{ route('admin.categories.delete',$item->id) }}"
                                   onclick="return confirm('Are you sure to delete?')"
                                   class="btn btn-danger btn-sm"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
@endsection
