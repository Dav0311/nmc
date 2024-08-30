
@extends('layout.sidebar')

@section('content')
    <div class="card">
       <div class="card-header">
        <div class="text">
        <h1>Enter New Sale</h1>
        <div class="card-icon float-end">
        <a href="{{ url('/sales/home') }}">
            <i class="bi bi-arrow-left">
                
            </i>
        </a>
        </div>
      
        </div>
            <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
            {{ session('success') }}
            </div>
           @endif
           @if (session('error'))
            <div class="alert alert-danger" role="alert">
            {{ session('error') }}
            </div>
           @endif
                <div class="container">
                <section class="section dashboard">
                <div class="row">
                   <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Product name</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Enter Product:</h6>
                                        <input type="text" class="form-control" placeholder="Product Name">
                                        <span class="text-muted small pt-2 ps-1 d-block">Product should be added before computation</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Revenue Card -->


                   <!-- Revenue Card -->
                   <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Product price</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cash"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Enter Price </h6>
                                        <input type="number" class="form-control" name="price" placeholder="0.00">
                                        <span class="text-muted small pt-2 ps-1 d-block">Product should be added before computation</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Revenue Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Quantity</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-bag-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Enter QTY:</h6>
                                        <input type="number" class="form-control" name="quantity" placeholder="0">
                                        <span class="text-muted small pt-2 ps-1 d-block">Product should be added before computation</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Revenue Card -->

                   <!-- Revenue Card -->
                   <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Amount paid</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cash-stack"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Pay</h6>
                                        <input type="number" class="form-control" name="amount_paid" placeholder="0.00">
                                        <span class="text-muted small pt-2 ps-1 d-block">Product should be added before computation</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Revenue Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Total cost </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-credit-card"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h3>Total Cost</h3>
                                        <h6 id="totalCost" class="text-danger">0.00</h6>
                                        <span class="text-muted small pt-2 ps-1 d-block">Product should be added before computation</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Revenue Card -->

                      <!-- Revenue Card -->
                      <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Balance</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-wallet"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Balance refund </h6>
                                        <h6 class="text-secondary" id="balance">0.00</h6>
                                        <span class="text-muted small pt-2 ps-1 d-block">Product should be added before computation</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Revenue Card -->

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-info me-md-2" type="button" id="addButton">Add</button>
                    <button class="btn btn-warning" type="button" id="receiptButton">Receipt</button>
                    </div>
                 </div>      
                    </section>
                </div>

            </div>
        </div>
    </div>

@endsection