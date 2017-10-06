@extends('layouts.app')



@section('content')

        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center"> Users Table</p>

            </div>

            
            <div class="panel-body">
               <table class="table table-hover">
                   <thead>
                       <th>Image</th>
                       <th>Name</th>
                       <th>Permission</th>
                       <th>Delete</th>
                   </thead>
               

                    <tbody>

                      @if ($users->count() > 0)
                      
                        @foreach ($users as $user)
                                <tr> 
                                    <td>
                                         <img src="{{ asset($user->profile->avatar) }}" alt="" width="60px" height="60px" style="border-style: 50%">
                                    </td> 

                                    <td>
                                        {{ $user->name}}
                                    </td>

                                    <td>
                                        @if ($user->admin)
                                              <a href="{{ route('users.not.admin', ['id'=>$user->id]) }}" class="btn btn-xs btn-danger">Remove Permission </a>
                                        @else
                                            <a href="{{ route('users.admin', ['id'=>$user->id]) }}" class="btn btn-xs btn-success">Make Admin</a>
                                        @endif
                                    </td>

                                    <td>
                                        Delete
                                    </td>
                                </tr>
                            @endforeach 
                      @else

                      <tr>
                        <th colspan="5" class="text-center">
                           No Post Published Yet
                        </th>
                      </tr>


                       @endif      

                    </tbody>

               </table>

            </div>


        </div>

        
        
@endsection