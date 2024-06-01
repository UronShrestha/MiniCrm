@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Software') }}</div>

                    <div class="card-body">
                        <form action="{{ route('employees.update', $employees->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="fname" class="form-label">Employee First  Name</label>
                                <input type="text" class="form-control" name="fname" value="{{ $employees->fname }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="lname" class="form-label">Employee Last  Name</label>
                                <input type="text" class="form-control" name="fname" value="{{ $employees->lname }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="software" class="form-label">Company Involved</label>
                                <div>
                                    @foreach($companies as $comp)
                                  
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="companies" value="{{ $comp->id }}" id="companies{{ $comp->id }}" @if(old('companies','$selectedCompanies)==$comp->id) checked @endif}}>
                                        <label class="form-check-label" for="companies{{ $comp->id }}">
                                            {{ $comp->name }}
                                        </label>
                                    </div>
                               
                                    @endforeach
                                </div>
                                
                            </div>
                        
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $employees->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ $employees->phone }}" required>
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
