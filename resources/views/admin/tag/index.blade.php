@extends('layouts.app')



@section('content')

        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center"> Tags Table</p>

            </div>

            
            <div class="panel-body">
               <table class="table table-hover">
                   <thead>
                       <th>Tags</th>
                       <th>Editing</th>
                       <th>Deleting</th>
                   </thead>
               

                    <tbody>

                        @if ($tag->count() > 0)
                              @foreach ($tag as $tags)
                                <tr> 
                                    <td>
                                            {{ $tags->tag }}
                                    </td> 

                                    <td>
                                       <a href="{{ route('tag.edit', ['id' => $tags->id ]) }}" class="btn btn-xs btn-primary">Edit</a> 
                                    </td>

                                    <td>
                                        <a href="{{ route('tag.destroy', ['id'=> $tags->id] ) }}" class="btn btn-xs btn-danger">Delete</a> 
                                    </td>
                                </tr>
                            @endforeach     

                        @else

                            <tr>
                                <th colspan="5" class="text-center">
                                    No Tags Published
                                </th>
                            </tr>

                        @endif
                          
                    </tbody>

               </table>

            </div>


        </div>

        
        
@endsection