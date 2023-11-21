<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Category') }}
        </h2>
    </x-slot>
    <div class="row h-100">
        <div class="col-sm-4 my-auto" style="margin:auto;max-width:90%; padding:100px 0px;">
            <div class="card card-block ">
                <h1 style="text-align:center; font-size:20px;font-weight:500;margin:10px 0px;">Add New Category</h1>
                @if(session('error'))
                <div class=" alert alert-danger">{{session('error')}}</div>
                @endif

                <form class="my-2 px-4" action="{{route('category.store')}}" method="post">
                    @csrf
                    <div class="form-group my-4">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="name" name="name" class="form-control" id="exampleInputname" aria-describedby="emailHelp" placeholder="Enter category name">
                    </div>
                    @error('name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group my-4">
                        <label for="exampleInputEmail1">Status</label>
                        <select name="status" class="form-control">
                            <option value="">Select option</option>
                            <option value="1" {{old('status') == 1 ? 'selected' : '' }}>Active</option>
                            <option value="2" {{old('status') == 2 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    @error('status')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <div class="d-flex justify-content-start my-4">
                        <button type="reset" class="btn btn-warning mx-2">Reset</button>
                        <button type="submit" class="btn btn-primary" style="background:#0d6efd;">Submit</button>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>