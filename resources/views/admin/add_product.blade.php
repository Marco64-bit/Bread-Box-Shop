<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }
        h1{
            color: white;
        }
        label{
            display: inline-block;
            width: 200px;
            font-size: 18px !important;
            color: white !important;
        }
        input[type='text']{
            width: 300px;
            height: 50px;
        }
        textarea{
            width: 450px;
            height: 80px;
        }

        .input_deg{
            padding: 15px;
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
                <h1>Add Product</h1>
                <div class="div_deg">
                    <form action="{{url('upload_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input_deg">
                            <label for="title">Product Title</label>
                            <input type="text" name="title" required>
                        </div>
                        <div class="input_deg">
                            <label for="description">Description</label>
                            <textarea name="description" required></textarea>
                        </div>
                        <div class="input_deg">
                            <label for="price">Price</label>
                            <input type="text" name="price">
                        </div>
                        <div class="input_deg">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity">
                        </div>
                        <div class="input_deg">
                            <label for="category">Product Category</label>
                            <select name="category" required>
                                <option value="">Please Select...</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input_deg">
                            <label for="image">Product Image</label>
                            <input type="file" name="image">
                        </div>
                        <div class="input_deg">
                            <input class="btn btn-success" type="submit" value="Add Product">
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