@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Add Income'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <form class="card-header pb-0" role="form" action="{{ route('income-store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <h6 class="mb-0">Add Income</h6>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="account_number_id" class="form-control-label">Account Number</label>
                                            <select class="form-control" name="account_number_id" required>
                                                <option value="">-- Select Account Number --</option>
                                                @foreach ($account_numbers as $acc)
                                                    <option value="{{ $acc->id }}">{{ $acc->account_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="customer_id" class="form-control-label">Customer</label>
                                            <select class="form-control" name="customer_id" required>
                                                <option value="">-- Select Customer --</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->customer_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="income_name" class="form-control-label">Income Name</label>
                                            <input class="form-control" type="text" name="income_name"
                                                value="{{ old('income_name') }}" placeholder="Enter income name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="product_id" class="form-control-label">Product</label>
                                            <select class="form-control" name="product_id" id="product_id" required>
                                                <option value="">-- Select Product --</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                                        {{ $product->product_name }} —
                                                        Rp. {{ number_format($product->price, 0, ',', '.') }}000
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price" class="form-control-label">Product Price</label>
                                            <input class="form-control" type="text" id="price" readonly
                                                placeholder="Rp 0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="quantity" class="form-control-label">Quantity</label>
                                            <input class="form-control" type="number" name="quantity" id="quantity"
                                                min="1" value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="total" class="form-control-label">Total Price</label>
                                            <input class="form-control" type="text" name="total" id="total"
                                                readonly placeholder="Rp 0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="payment_type" class="form-control-label">Payment Type</label>
                                    <select class="form-control" name="payment_type" required>
                                        <option value="">-- Select Payment Type --</option>
                                        <option value="Cash" {{ old('payment_type') == 'Cash' ? 'selected' : '' }}>Cash
                                        </option>
                                        <option value="Credit" {{ old('payment_type') == 'Credit' ? 'selected' : '' }}>
                                            Credit</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end" style="margin-right: 20px;">
                            <a href="{{ route('income') }}" class="text-secondary font-weight-bold text-xs"
                                data-toggle="tooltip" data-original-title="Cancel income">
                                <span class="btn btn-xs text-sm bg-gradient-danger">Cancel</span>
                            </a>
                            <button type="submit" class="btn btn-xs text-sm bg-gradient-success ms-2"
                                data-original-title="Save account number">
                                Save
                            </button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const productSelect = document.getElementById("product_id");
        const priceInput = document.getElementById("price");
        const quantityInput = document.getElementById("quantity");
        const totalInput = document.getElementById("total");
        const increaseBtn = document.getElementById("increaseQty");
        const decreaseBtn = document.getElementById("decreaseQty");

        function calculateTotal() {
            const price = parseFloat(priceInput.value) || 0;
            const quantity = parseInt(quantityInput.value) || 0;
            totalInput.value = (price * quantity).toFixed(2);
        }

        productSelect.addEventListener("change", function() {
            const selected = productSelect.options[productSelect.selectedIndex];
            const price = selected.dataset.price ? parseFloat(selected.dataset.price) : 0;
            priceInput.value = price;
            calculateTotal();
        });

        quantityInput.addEventListener("input", calculateTotal);

        increaseBtn.addEventListener("click", function() {
            quantityInput.value = parseInt(quantityInput.value) + 1;
            calculateTotal();
        });

        decreaseBtn.addEventListener("click", function() {
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
                calculateTotal();
            }
        });
    });
</script>
