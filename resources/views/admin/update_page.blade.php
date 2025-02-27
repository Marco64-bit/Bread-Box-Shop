<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        label{
            display: inline-block;
            width: 200px;
            padding: 20px;

        }

        input[type='text']{
            width: 300px;
            height: 60px;
        }

        textarea{
            width: 450px;
            height: 100px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <h2>Update Product</h2>

            <div class="div_deg">
                <form action="{{url('edit_product', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div>
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{$data->title}}">
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <textarea name="description">{{$data->description}}</textarea>
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input type="text" name="price" value="{{$data->price}}">
                    </div>
                    <div>
                        <label for="quantity">Quantity</label>
                        <input type="text" name="quantity" value="{{$data->quantity}}">
                    </div>
                    <div>
                        <label for="category">Category</label>
                        <select name="category" >
                            <option value="{{$data->category}}">{{$data->category}}</option>
                            @foreach ($categories as $category)
                                
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="current_image">Current Image</label>
                        <img width="150" src="/products/{{$data->image}}">
                    </div>
                    <div>
                        <label for="new_image">New Image</label>
                        <input type="file" name="image">
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" value="Update Product">
                    </div>
                </form>
            </div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>