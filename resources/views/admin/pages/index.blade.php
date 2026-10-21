@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="float-start">Pages</h3>
                <div class="float-end"><a href="{{ route('admin.pages.create') }}"
                                          class="btn btn-dark btn-sm">Create</a></div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $index => $item)
                        <tr>
                            <td>{{ ($pages->currentPage() - 1) * $pages->perPage() + $index + 1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.pages.edit',$item->id) }}"
                                   class="btn btn-primary btn-sm"><i
                                        class="fa fa-pencil"></i></a>
                                <a href="{{ route('admin.pages.delete',$item->id) }}"
                                   onclick="return confirm('Are you sure to delete?')"
                                   class="btn btn-danger btn-sm"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    {{ $pages->links() }}
                </table>
            </div>
        </div>
@endsection
