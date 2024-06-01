@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Add Employees') }}</div>

                    <div class="card-body">
                        <form action="{{ route('employees.store') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">First Name</label>
                                <input type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" required>

                                @error('fname')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Last Name</label>
                                <input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" required>

                                @error('lname')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="name" class="form-label">Company Involved</label>
                                <div>
                                    @foreach($companies as $comp)
                                  
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="company_id" value="{{ $comp->id }}" id="companies{{ $comp->id }}">
                                            <label class="form-check-label" for="companies{{ $comp->id }}">
                                                {{ $comp->name }}
                                            </label>
                                        </div>
                                  
                                @endforeach
                                </div>

                                @error('lname')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            

       

                            <div class="mb-3">
                              <label for="softwaredesc" class="form-label">Phone Number </label>
                              <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required>

                              @error('phone')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>
                      

                        <div class="mb-3">
                            <label for="email" class="form-label">Email </label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" required>

                            @error('softwaredesc')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>



                     <div class="mb-3">

                       

                            <button type="submit" class="btn btn-primary">Submit</button>
                       </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection