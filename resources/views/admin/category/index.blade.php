@extends('layouts.app')



@section('content')

        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center"> Categories Table</p>

            </div>

            
            <div class="panel-body">
               <table class="table table-hover">
                   <thead>
                       <th>Categories</th>
                       <th>Editing</th>
                       <th>Deleting</th>
                   </thead>
               

                    <tbody>
                            @foreach ($categories as $category)
                                <tr> 
                                    <td>
                                            {{ $category->category }}
                                    </td> 

                                    <td>
                                        <a href="{{ route('category.edit', ['id'=>$category->id]) }}" class="btn btn-xs btn-primary">Edit</a>
                                    </td>

                                    <td>
                                        <a href="{{ route('category.destroy', ['id'=>$category->id]) }}" class="btn btn-xs btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach     

                    </tbody>

               </table>

            </div>


        </div>

        
        
@endsection