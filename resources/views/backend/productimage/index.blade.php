@extends('backend.templates.main')

@section('content')

                  <div class="x_title">
                    <h2>Product</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-plus"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('productImage.create')}}">Add new Item</a>
                            
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
                          <th>Product Name</th> 
                          <th>Image Title</th>
                          <th>Image</th>
                          <th>Status</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($productimage as $procat)
                        <tr>
                          <td>{{$procat->product->product_name}}</td>
                          <td>{{$procat->img_title}}</td>
                          <td>
                            <img src="{{asset('images/'.$procat->img)}}" height="50px" width="50px" alt="">
                          </td>
                          <td>{{$procat->status}}</td>                         
                            
                          <td>
                            <button class="btn bg-transparent">
                              <a href="{{route('productImage.edit', $procat->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </button>
                          </td>
                          <td>
                            <form action="{{route('productImage.destroy', $procat->id)}}" method="POST">
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