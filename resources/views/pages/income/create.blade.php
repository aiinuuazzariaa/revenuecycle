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
                                                    <option value="{{ $acc->id }}"
                                                        data-number="{{ $acc->account_number }}">{{ $acc->account_name }}
                                                    </option>
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
                                <div class="row" id="product_section">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="product_id" class="form-control-label">Product</label>
                                            <select class="form-control" name="product_id" id="product_id">
                                                <option value="">-- Select Product --</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                                        {{ $product->product_name ?? '-' }} —
                                                        Rp. {{ number_format($product->price, 0, ',', '.') }}000
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="price_section">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="price" class="form-control-label">Product Price</label>
                                            <input class="form-control" type="text" id="price" readonly
                                                placeholder="Rp 0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="quantity_section">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="quantity" class="form-control-label">Quantity</label>
                                            <input class="form-control" type="number" name="quantity" id="quantity"
                                                min="1" value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="total" class="form-control-label">Total</label>
                                            <input class="form-control" type="text" name="total" id="total"
                                                placeholder="Rp 0" readonly>
                                            <input type="hidden" name="total" id="total_raw">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="payment_type" class="form-control-label">Payment Type</label>
                                            <select class="form-control" name="payment_type" required>
                                                <option value="">-- Select Payment Type --</option>
                                                <option value="Cash"
                                                    {{ old('payment_type') == 'Cash' ? 'selected' : '' }}>Cash
                                                </option>
                                                <option value="Credit"
                                                    {{ old('payment_type') == 'Credit' ? 'selected' : '' }}>
                                                    Credit</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="dp_section" style="display:none;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nominal" class="form-control-label">Nominal</label>
                                            <input class="form-control" type="number" name="nominal" id="nominal"
                                                min="0" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="due_date_section" style="display:none;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="payment_due_date" class="form-control-label">Payment Due
                                                Date</label>
                                            <input class="form-control" type="date" name="payment_due_date"
                                                id="payment_due_date">
                                        </div>
                                    </div>
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

        const accSelect = document.querySelector("select[name='account_number_id']");
        const paymentSelect = document.querySelector("select[name='payment_type']");

        const productSection = document.getElementById("product_section");
        const priceSection = document.getElementById("price_section");
        const quantitySection = document.getElementById("quantity_section");

        const dpSection = document.getElementById("dp_section");
        const dueDateSection = document.getElementById("due_date_section");

        const productInput = document.getElementById("product_id");
        const quantityInput = document.getElementById("quantity");
        const totalInput = document.getElementById("total");
        const priceInput = document.getElementById("price");

        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID', {
                minimumFractionDigits: 0
            }).format(value);
        }

        function toggleAccountLogic() {
            const accountNumber = accSelect.options[accSelect.selectedIndex].dataset.number;

            if (accountNumber == "4201") {
                productSection.style.display = "none";
                priceSection.style.display = "none";
                quantitySection.style.display = "none";

                productInput.removeAttribute("required");
                quantityInput.removeAttribute("required");

                totalInput.readOnly = false;
                totalInput.value = "";
                totalInput.addEventListener("input", function() {
                    let clean = this.value.replace(/[^0-9]/g, "");
                    document.getElementById('total_raw').value = clean;
                });
            } else {
                productSection.style.display = "block";
                priceSection.style.display = "block";
                quantitySection.style.display = "block";

                productInput.setAttribute("required", true);
                quantityInput.setAttribute("required", true);

                totalInput.readOnly = true;
            }
        }

        function calculateTotal() {
            const price = parseInt(productInput.selectedOptions[0]?.dataset.price || 0);
            const qty = parseInt(quantityInput.value || 0);
            const total = price * qty;

            priceInput.value = "Rp " + formatRupiah(price);
            totalInput.value = "Rp " + formatRupiah(total);

            document.getElementById('total_raw').value = total;
        }




        function toggleCreditFields() {
            if (paymentSelect.value === "Credit") {
                dpSection.style.display = "block";
                dueDateSection.style.display = "block";
            } else {
                dpSection.style.display = "none";
                dueDateSection.style.display = "none";
            }
        }

        accSelect.addEventListener("change", toggleAccountLogic);
        productInput.addEventListener("change", calculateTotal);
        quantityInput.addEventListener("input", calculateTotal);
        paymentSelect.addEventListener("change", toggleCreditFields);

        toggleAccountLogic();
        toggleCreditFields();
        calculateTotal();
    });

    document.querySelector("form").addEventListener("submit", function() {
        const cleanTotal = totalInput.value.replace(/[^0-9]/g, "");
        document.getElementById('total_raw').value = cleanTotal;
    });
</script>
