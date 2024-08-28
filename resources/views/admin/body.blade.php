<h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-user-1"></i></div><strong>Total Clients</strong>
                    </div>
                    <div class="number dashtext-1">{{$users}}</div>
                  </div>
                  
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-contract"></i></div><strong>Total Products</strong>
                    </div>
                    <div class="number dashtext-2">{{$products}}</div>
                  </div>
                  
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Total Orders</strong>
                    </div>
                    <div class="number dashtext-3">{{$orders}}</div>
                  </div>
                  
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Total Delivered</strong>
                    </div>
                    <div class="number dashtext-4">{{$delivered}}</div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </section>
        
        
        
        
        
        
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <p class="no-margin-bottom"><?php echo date('Y') ?> &copy; Bread Box.</p>
            </div>
          </div>
        </footer>