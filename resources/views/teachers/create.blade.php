@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
   <div class="col-md-12">
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="d-inline-flex"><i class="material-icons mr-1">home</i> Home</a></li>
            <li class="breadcrumb-item"><a href="https://medicalkotoba.meroiserver.com/users">USER</a></li>
            <li class="breadcrumb-item active">Create</li>
         </ol>
      </nav>
      <div class="card">
         <div class="card-body">
            <h1 class="d-flex mb-3">
               <i class="material-icons align-self-center mr-1">add_circle</i>
               <span class="d-inline-block">USER / Create</span>
            </h1>
            <div class="row">
               <div class="col-md-12">
                  <form method="POST" action="{{ route('teachers.store') }}" novalidate="">

                     @include('teachers._form')
                     <div class="d-flex justify-content-end">
                              <a class="btn btn-secondary d-inline-flex mr-3" href="/home"><i class="material-icons mr-1">fast_rewind</i> Back</a>
                              <button type="submit" class="btn btn-primary">Create</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
@section('js')
<script type="text/javascript">
   const hasAnyError = `{{$errors->any() ?? ''}}`;

   function addCourses(){

      let id =   $('#faculty').val();

      $('#courses').html('');
      if(!id){
         return false;
      }
      return $.get(`/api/courses_list/${id}`,function(response){

         let courses = response.courses;

         var opt = '';

         for(let c of courses){

            opt += `<option value='${c.id}'>${c.name}</option>`;

         }
         $('#courses').select2('destroy');
         $('#courses').html(opt);
         $('#courses').select2({ placeholder: 'Select Courses'});

      }).fail(function(){

         alert("Something Went Wrong");

      });
   }

   $(function(){
      $('#courses').select2({ placeholder: 'Select Courses'});

      $('#faculty').change(function(){
         
         addCourses();

      });
      if(hasAnyError){

         addCourses().done(function(){
            $('#courses').select2('destroy');
            let selectedCourses =   @if($errors->any()) @json(old('courses_id') ?? []) @else '' @endif;
            $('#courses').val(selectedCourses);
            $('#courses').select2({ placeholder: 'Select Courses'})


         });
        

       
      }
   });
</script>
@endsection
@endsection