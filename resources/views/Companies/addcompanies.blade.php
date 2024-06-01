@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Add Companies') }}</div>

                    <div class="card-body">
                        <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>

                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" required>

                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control" name="logo" required>
                            </div>

                            <div class="mb-3">
                                <label for="website" class="form-label">website</label>
                                <input type="url" class="form-control @error('website') is-invalid @enderror" name="website" required>

                                @error('website')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                          

       

                         
                      



                    <div class="mb-3">
                            <input type="submit" value="Save" class="btn btn-success">
                     </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection