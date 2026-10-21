@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="float-start">Blogs</h3>
                <div class="float-end"><a href="{{ route('admin.blogs.create') }}"
                                          class="btn btn-dark btn-sm">Create</a></div>
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
                    @foreach($blogs as $index => $blog)
                        <tr>
                            <td>{{ ($blogs->currentPage() - 1) * $blogs->perPage() + $index + 1 }}</td>
                            <td><img src="{{ asset('blog-images/'.$blog->image) }}" alt="Image" class="img-fluid"
                                     width="100px"/></td>
                            <td>{{ $blog->title }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.blogs.edit',$blog->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fa fa-pencil"></i></a>
                                <a href="{{ route('admin.blogs.delete',$blog->id) }}"
                                   onclick="return confirm('Are you sure to delete?')"
                                   class="btn btn-danger btn-sm"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    {{ $blogs->links() }}
                </table>
            </div>
        </div>
@endsection
