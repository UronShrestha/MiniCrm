

@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-10">
            @if (session()->has('message'))
            <script>
             swal.fire("", "{{ Session::get('message') }}", "success", {
                button:true,
      button: "OK",
      timer:3000,
    });
            </script>
        @endif
       </div>
    <div class="row justify-content-center">
        <div class="col-10">
<a href="{{ route('companies.create')}}" class="btn btn-success btn-sm mb-3">Add New Software</a>
    
   

       
<table class="table table-striped table-bordered">
    <thead>
    
    <th>SN  </th>
     
        <th>Companies Name</th>
        <th>Email</th>
        <th> logo </th>
  
        <th>website</th>
           
       
       
        
        <th>Delete</th>
        <th>Update</th>

    </thead>
    @foreach ($pagedCompanies as $companies)
        <tr>
        
            <td>{{ $companies->id}}</td>
            <td>{{ $companies->name}}</td>
            <td>{{ $companies->email}}</td>
            <td>
                
                <img src="{{ asset('storage/'.$companies->logo)}}" alt="logo" width="50px" height="50px">

            </td>
           
            <td>{{ $companies->website}}</td>
    
          
          
            
            <td>
              <form action="{{route('companies.destroy',$companies->id)}}" method="POST">
                @csrf
                @method('DELETE')   
           <button type="submit" class="btn  btn-sm" onclick="return confirm('Are you sure to delete ?')">   <i class="fa-solid fa-trash" style="color: #e91313;"></i></button>
        </form>
    </td>
            <td><a href="{{route('companies.edit',$companies->id)}}" class="btn  btn-sm"><i class="fa-solid fa-pen-to-square" style="color: #1162ee;"></i></a></td>
            
        </tr>
    @endforeach
</table>
<div class="mt-4">
    {{ $pagedCompanies->links()}}  {{-- this is for pagination links--}}
</div>
        </div>
    </div>
</div>

@endsection
