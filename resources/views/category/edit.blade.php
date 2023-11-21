<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>
    <div class="">
        <div class="col-sm-4 my-auto" style="margin:auto;max-width:90%; padding:100px 0px;">
            <div class="card card-block ">
                <h2 style="text-align:center; font-size:20px;font-weight:500;margin:10px 0px;"> Edit  Category</h2>
               

                <form class="my-2 px-4" action="{{route('category.update',$category->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group my-4">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="name" name="name" class="form-control"  value="{{$category->name}}"id="exampleInputname" aria-describedby="emailHelp" >
                    </div>
                    @error('name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group my-4">
                        <label for="exampleInputEmail1">Status</label>
                        <select name="status" class="form-control">
                            <option value="">Select option</option>
                            <option value="1" {{$category->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="2" {{$category->status == 2 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    @error('status')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <div class="d-flex justify-content-start my-4">
                        <button type="reset" class="btn btn-warning mx-2">Reset</button>
                        <button type="submit" class="btn btn-primary" style="background:#0d6efd;">Update</button>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>