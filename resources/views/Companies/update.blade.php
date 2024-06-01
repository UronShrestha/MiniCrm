@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Companies') }}</div>

                    <div class="card-body">
                        <form action="{{ route('companies.update', $companies->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">  Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $companies->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $companies->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="logo" class="form-label">logo</label>
                                <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" accept=".jpg,.png,.jpeg" value="{{ $companies->logo? asset('storage/'. $companies->logo) : '' }}">
                            
                                @error('logo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                              
                            <div class="mb-3">
                                <label for="website" class="form-label">website</label>
                                <input type="url" class="form-control @error('website') is-invalid @enderror" name="website" required value="{{ $companies->website}}">

                                @error('website')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        
                           

                            <div class="mb-3">
                                <input type="submit" value="Update" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
