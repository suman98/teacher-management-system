<div>
   @csrf
   <div class="row">
      <div class="col-md-8">
         <div class="form-group">
            <label >Lecturer's Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
            value="@if($errors->any()){{ old('name') }}@else{{ $teacher->name ?? ""}}@endif" 
            required="" placeholder="Enter Lecturer Name..">
            @error('name')
                 <div class="invalid-feedback">{{ $errors->first("name") }}</div>
            @enderror
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label >Gender</label>
            <select class="form-control" name="gender">
               <option value="M">Male</option>
               <option value="F" 
               @if($errors->any()){{ old('gender') == 'F' ? 'selected' : '' }}@else{{ ($teacher->gender??'') == 'F' ? 'selected' : '' }}@endif>Female</option>
            </select>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label >Phone Number.</label>
            <input type="text" class="form-control  @error('phone_number') is-invalid @enderror" name="phone_number" value="@if($errors->any()){{ old('phone_number') }}@else{{ $teacher->phone_number ?? ""}}@endif" required="" placeholder="Phone Number..">
           @error('phone_number')
            <div class="invalid-feedback">{{ $errors->first("phone_number") }}</div>
           @enderror
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label >Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="@if($errors->any()){{ old('email') }}@else{{ $teacher->email ?? ""}}@endif" required="" placeholder="Email..">
             @error('email') 
            <div class="invalid-feedback">{{ $errors->first("email") }}</div>
            @enderror
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label >Address.</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="@if($errors->any()){{ old('address') }}@else{{ $teacher->address ?? ""}}@endif" required="" placeholder="Phone Number..">
            @error('address')
            <div class="invalid-feedback">{{ $errors->first("address") }}</div>
            @enderror
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label >Nationality</label>
            <select class="form-control  @error('nationality') is-invalid @enderror" 
            name="nationality">
               <option value="">Select Nationality</option>
               @foreach($nationality as $key=>$value)
                  <option value="{{ $value->id }}"
                  @if($errors->any()){{ old('nationality') == $value->id ? 'selected' : '' }}@else{{ ($teacher->gender??'') == $value->id  ? 'selected' : '' }}@endif>
                     {{ $value->name }}</option>
               @endforeach
            </select>
             @error('nationality')
            <div class="invalid-feedback">{{ $errors->first("nationality") }}</div>
            @enderror
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label >Date Of Birth</label>
            <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="@if($errors->any()){{ old('dob') }}@else{{ $teacher->dob ?? ""}}@endif" required="" placeholder="Date Of Birth.." max='{{date('Y-m-d')}}' >
            @error('dob')
            <div class="invalid-feedback">{{ $errors->first("dob") }}</div>
            @enderror
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label >Faculty</label>
            <select class="form-control @error('faculty_id') is-invalid @enderror" id='faculty' 
            name="faculty_id">
               <option value="">Select Faculty</option>
                  @foreach($faculty as $key=>$value)
                  <option value="{{ $value->id }}"
                      @if($errors->any()){{ old('faculty_id') == $value->id ? 'selected' : '' }}@else{{ ($teacher->faculty_id??'') == $value->id  ? 'selected' : '' }}@endif>{{ $value->name }}</option>
                  @endforeach
            </select>
            @error('faculty_id')
            <div class="invalid-feedback">{{ $errors->first("faculty_id") }}</div>
            @enderror
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label >Courses</label>
            <select class="form-control @error('courses_id') is-invalid @enderror" id='courses'  multiple="true" name="courses_id[]">
               <option value="">Select Courses</option>
            </select>
      
            @error('courses_id') 

            <div class="invalid-feedback">{{ $errors->first("courses_id") }}</div>
            @enderror
         </div>
      </div>
   </div>
<div>
