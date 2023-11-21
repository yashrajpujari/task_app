<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

<div class="">
    <div class="col-sm-12 my-auto" style="margin:auto;max-width:90%; padding:100px 0px;">

      <div class="card card-block ">
       
          <a href="{{route('tasks.create')}}" class="btn btn-primary m-4" style="width:15%;display:inline-block" >create new task</a>
        
        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <table class="table table-striped" style="" id="table_id">
          <thead>
            <tr>
              <th scope="col" style="text-align:center;">Sr No.</th>
              <th scope="col" style="text-align:center;">Title</th>
              <th scope="col" style="text-align:center;">Status</th>
              <th scope="col" style="text-align:center;">Category</th>
              <th scope="col" style="text-align:center;">Description</th>
              <th scope="col" style="text-align:center;">Dedline</th>
              <th scope="col" style="text-align:center;">Action</th>

            </tr>
          </thead>
          <tbody>
            @php
            $i=1;
            @endphp
            @if($tasks->count()>0)
            @foreach($tasks as $task)
            <tr>
              <th scope="row">{{$i++}}</th>
              <td>{{$task->title}}</td>
              <td>{{$task->status == 2 ?"pending":"Inprogress"}}</td>
              <td>{{ implode(', ', $task->categories->pluck('name')->toArray()) }}</td>
              <td>{{$task->description}}</td>
              <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $task->dedline)->format('F j, Y') }}</td>

              <td class="d-flex justify-content-center">
                <a href="{{route('tasks.edit',$task->id)}}" class="btn btn-success mx-2">Edit</a>
                <form action="{{route('tasks.destroy',$task->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <input type="submit" class="btn btn-danger" value="Delete" style="background:#dc3545;">
                </form>
              </td>
            </tr>

            @endforeach
            @else
            <tr>
              <td colspan="6">No records found.</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-app-layout>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
$(function() {
$("#table_id").dataTable();
});
</script>