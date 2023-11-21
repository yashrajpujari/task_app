<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Categories') }}
    </h2>
  </x-slot>
  <div class="">
    <div class="col-sm-12 my-auto" style="margin:auto;max-width:90%; padding:100px 0px;">

      <div class="card card-block ">
        <div class="">

          <a href="{{route('category.create')}}" class="btn btn-primary m-4" style="width:20%" ;> Add new Category</a>
        </div>
        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <table class="table table-striped" style="text-align:center;">
          <thead>
            <tr>
              <th scope="col" style="text-align:center;">Sr No.</th>
              <th scope="col" style="text-align:center;">Name</th>
              <th scope="col" style="text-align:center;">Status</th>
              <th scope="col" style="text-align:center;">Action</th>

            </tr>
          </thead>
          <tbody>
            @php
            $i=1;
            @endphp
            @if($categories->count()>0)
            @foreach($categories as $category)

            <tr>

              <td>{{$i++}}</td>
              <td>{{$category->name}}</td>
              <td>{{$category->status ==1?"Active":"Inactive"}}</td>

              <td class="d-flex justify-content-center">
                <a href="{{route('category.edit',$category->id)}}" class="btn btn-success mx-2">Edit</a>
                <form action="{{route('category.destroy',$category->id)}}" method="post">
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