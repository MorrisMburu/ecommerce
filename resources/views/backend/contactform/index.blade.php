@extends('backend.templates.main')

@section('content')

                  <div class="x_title">
                    <h2>Update Contact form</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-plus"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('contactform.create')}}">Add new Item</a>
                            
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>email</th>
                          <th>Subject</th>
                          <th>Message</th> 
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($contactForm as $procat)
                        <tr>
                          <td>{{$procat->name}}</td>
                          <td>{{$procat->email}}</td>
                          <td>{{$procat->subject}}</td>
                          <td>{{$procat->message}}</td>
                          
                            
                          <td>
                            <button class="btn bg-transparent">
                              <a href="{{route('contactform.edit', $procat->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </button>
                          </td>
                          <td>
                            <form action="{{route('contactform.destroy', $procat->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn bg-transparent">
                              <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </button>
                            </form>
                          </td>
                        </tr>
                        @endforeach 
                      </tbody>
                    </table>

                  </div>
                
@endsection