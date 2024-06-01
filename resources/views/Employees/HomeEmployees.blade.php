@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-10">
            @if (session()->has('message'))
            <script>
                swal.fire("", "{{ Session::get('message') }}", "success", {
                    button: true,
                    button: "OK",
                    timer: 3000,
                });
            </script>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10">
            <a href="{{ route('employees.create') }}" class="btn btn-success btn-sm mb-3">Add Employees</a>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Employee First Name</th>
                        <th>Employee Last Name</th>
                        <th>Company Involved</th>
                        <th>Employee Email</th>
                        <th>Employee Phone</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pagedEmployees as $employees)
                    <tr>
                        <td>{{ $employees->id }}</td>
                        <td>{{ $employees->fname }}</td>
                        <td>{{ $employees->lname }}</td>
                        <td>{{ $employees->companies->name }}</td>
                        <td>{{ $employees->email }}</td>
                        <td>{{ $employees->phone }}</td>
                        <td>
                            <form action="{{ route('employees.destroy', $employees->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm" onclick="return confirm('Are you sure to delete?')">
                                    <i class="fa-solid fa-trash" style="color: #e91313;"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('employees.edit', $employees->id) }}" class="btn btn-sm">
                                <i class="fa-solid fa-pen-to-square" style="color: #1162ee;"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $pagedEmployees->links() }} {{-- this is for pagination links --}}
            </div>
        </div>
    </div>
</div>
@endsection
