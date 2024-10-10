@extends('layout.sidebar')

@section('content')
 
 <div class="content-page">
     <div class="container-fluid add-form-list">
     <div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Add Sale</h4>
                </div>
            </div>
            <div class="card-body">
            <form id="saleForm" action="#" data-toggle="validator">
        <div class="row">                                  
            <div class="col-md-6"> 
                <div class="form-group">
                    <label>Product Category *</label>
                    <select id="category" name="type" class="form-control" data-style="py-0">
                        <option>Completed</option>
                        <option>Pending</option>
                    </select>
                </div>
            </div>  
            <div class="col-md-6"> 
                <div class="form-group">
                    <label>Product *</label>
                    <select id="product" name="type" class="form-control" data-style="py-0">
                        <option>Completed</option>
                        <option>Pending</option>
                    </select>
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                    <label>Price *</label>
                    <input id="price" type="number" class="form-control" placeholder="0.00" required>
                    <div class="help-block with-errors"></div>
                </div>
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                    <label>Quantity *</label>
                    <input id="quantity" type="number" class="form-control" placeholder="Enter Quantity" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Order Discount</label>
                    <input id="discount" type="number" class="form-control" placeholder="0.00">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Total Amount</label>
                    <input id="total_amount" type="number" class="form-control" placeholder="0.00" readonly>
                </div>
            </div>
            <div class="col-md-6"> 
                <div class="form-group">
                    <label>Payment Status *</label>
                    <select id="paymentStatus" name="type" class="form-control" data-style="py-0">
                        <option>Pending</option>
                        <option>Due</option>
                        <option>Paid</option>
                    </select>
                </div>
            </div> 
        </div>                            
        <button type="submit" class="btn btn-primary mr-2">Add Sale</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </form>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Items</h4>
                    <h5 class="card-title float-end">Reference No. <span>456281</span></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="itemsTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Amount</th>
                                <th>Payment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dynamically table data -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-right">Grand Total</th>
                                <th id="grandTotal">0.00</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>                               
                <button type="submit" class="btn btn-primary mr-2">Receipt</button>
            </div>
        </div>
    </div>
</div>

                </div>
            </div>
        </div>
        <!-- Page end  -->

       

   
@endsection