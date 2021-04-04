@extends('layouts.app')

@section('content')
 <div class="container">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="/" class="d-inline-flex"><i class="material-icons mr-1">home</i> Home</a></li>
               <li class="breadcrumb-item active">Lecture</li>
            </ol>
         </nav>
         <div class="card">
            <div class="card-body">
               <h1 class="d-flex mb-3">
                  <i class="material-icons align-self-center mr-1">view_headline</i>
                  <span class="d-inline-block">Lecture</span>
                  <a class="btn btn-secondary d-inline-flex ml-auto" href="{{route('teachers.export','csv')}}"><span class="align-self-center">Excel File Download</span></a>
                  <a class="btn btn-success d-inline-flex ml-auto" href="{{ route('teachers.create') }}"><i class="material-icons align-self-center mr-1">add_circle</i><span class="align-self-center">Create</span></a>
               </h1>
               
               <div class="row">
                  <div class="col-md-12">
                     <table class="table table-sm table-striped sp-omit">
                        <thead>
                           <tr>
                              <th scope="col">
                                 Name
                              </th>
                              <th scope="col">
                                 Gender
                              </th>
                              <th scope="col">
                                 Phone 
                              </th>
                              <th  scope="col">
                                 Email
                              </th>
                               <th  scope="col">
                                 Address
                              </th>
                              <th  scope="col">
                                 Nationality
                              </th>
                              <th  scope="col">
                                 Faculty
                              </th>
                              <th  scope="col">
                                 DOB
                              </th>
                              <th class="text-right">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($teachers as $key=>$value)
                           <tr>
                              <td scope="row">{{ $value->name }}</td>
                              <td>{{ $value->getGender() }}</td>
                              <td>{{ $value->phone_number }}</td>
                              <td>{{ $value->email }}</td>
                              <td>{{ $value->address }}</td>
                              <td>{{ $value->getNation->name }}</td>
                              <td>{{ $value->faculty->name }}</td>
                              <td>{{ $value->dob }}</td>
                              <td class="text-right">
                                 <div class="btn-group" role="group">
                                
                                    <a class="btn btn-sm btn-warning" 
                                    href="#" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons d-block">edit</i></a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="material-icons d-block">delete</i></button>
                                 </div>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                     <div align="center">{!! $teachers->render()  !!}</div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection