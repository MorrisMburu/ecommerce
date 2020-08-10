@extends('backend.templates.main')

@section('content')

                  <div class="x_title">
                    <h2>Product Category</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-plus"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('productcategory.create')}}">Add new Item</a>
                            
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
                          <th>#</th>
                          <th>Product Category</th> 
                          <th></th>
                          <th>Status</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($productcategory as $procat)
                        <tr>
                          <th scope="row">{{$procat->id}}</th>
                          <td>{{$procat->brand_name}}</td>
                          <td>{{$procat->slug}}</td>
                          <td>{{$procat->status}}</td>
                          <td>
                            <button class="btn bg-transparent">
                              <a href="{{route('productcategory.edit', $procat->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </button>
                          </td>
                          <td>
                            <form action="{{route('productcategory.destroy', $procat->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn bg-transparent">
                              <a href="{{route('productcategory.destroy', $procat->id)}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </button>
                            </form>
                          </td>
                        </tr>
                        @endforeach 
                      </tbody>
                    </table>

                  </div>
                
@endsection



						
					