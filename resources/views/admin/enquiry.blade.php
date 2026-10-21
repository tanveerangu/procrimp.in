@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="float-start">Enquiries</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enquiries as $index => $item)
                            <tr>
                                <td>{{ ($enquiries->currentPage() - 1) * $enquiries->perPage() + $index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->message }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{ $enquiries->links() }}
                </table>
            </div>
        </div>
    @endsection
