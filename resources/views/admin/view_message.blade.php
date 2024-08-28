<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>

        .detail-box {
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
            <div class="col-md-12">
                <h1 class="text-white">User's Message</h1>
                    <div class="detail-box">
                        <h6>Name:
                            <span class="text-white">{{ $contact->name }}</span>
                        </h6>
                        <h6>Email:
                            <span class="text-white">{{ $contact->email }}</span>
                        </h6>
                        <h6>
                            Phone: 
                            <span class="text-white">{{ $contact->phone }}</span>
                        </h6>
                    </div>


                    <div class="detail-box">
                        <h6>Message:</h6>
                        <p class="text-white">{{ $contact->message }}</p>

                    </div>
                    <div class="mt-4 text-center">
                        <h5>Delete:</h5>
                        <a class="btn btn-danger w-25" onclick="confirmation(event)"
                        href="{{ url('delete_message', $contact->id) }}"><i class="fa-solid fa-trash"></i></a>
                    </div>
                    
                </div>
            </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>