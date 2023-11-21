<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>
  <div class="">
    <div class="col-sm-4 my-auto" style="margin:auto;max-width:90%; padding:100px 0px;">
      <div class="card card-block ">
        <h1 style="text-align:center;"> Edit Task</h1>
        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif

        <form class="my-2 px-4" action="{{route('tasks.update',$task->id)}}" method="post">
          @csrf
          @method('put')
          <div class="form-group my-4">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputtitle" value="{{$task->title}}" placeholder="Enter title">
          </div>
          @error('title')
          <div class="text-danger">{{$message}}</div>
          @enderror
          @php

          $task_category=($task->categories->pluck('id')->toArray());
          @endphp
          <div class="form-group my-4">
            <label for="exampleInputEmail1">Category</label>
            <select name="category" class="form-control">
              <option value="">Select option</option>
              @foreach($categories as $category)
              <option value="{{$category->id}}" {{in_array($category->id,$task_category)?"selected":""}}>{{$category->name}}</option>

              @endforeach
            </select>
          </div>
          <div class="form-group my-4">
            <label for="exampleInputEmail1">Status</label>
            <select name="status" class="form-control">
              <option value="">Select option</option>
              <option value="2" {{$task->status==2?"selected":""}}>Pending</option>
              <option value="1" {{$task->status==1?"selected":""}}>In progress</option>
            </select>

          </div>
          @error('status')
          <div class="text-danger">{{$message}}</div>
          @enderror
          <div class="form-group my-4">

            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$task->description}}</textarea>

          </div>
          @error('description')
          <div class="text-danger">{{$message}}</div>
          @enderror
          <div class="form-group my-4">
            <label for="exampleInputEmail1">Dedline</label>
            <input type="date" name="dedline" class="form-control" value="{{$task->dedline}}">
          </div>
          @error('dedline')
          <div class="text-danger">{{$message}}</div>
          @enderror
          <div class="d-flex justify-content-start my-4">
            <button type="reset" class="btn btn-warning mx-2">Reset</button>
            <button type="submit" class="btn btn-primary" style="background:#0d6efd">Update</button>
        </form>

      </div>
    </div>
  </div>

</x-app-layout>