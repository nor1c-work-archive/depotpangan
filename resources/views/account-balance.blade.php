@extends('layouts.master')
@section('content')
    <div class="container-fuild">
        <nav aria-label="breadcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">{{ trans('lables.bread-crumb-home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('lables.bread-order') }}</li>
                </ol>
            </div>
        </nav>
    </div>

    <section class="order-one-content pro-content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3 d-none d-lg-block d-xl-block">
                    <div class="heading">
                        <h2>{{ trans('lables.orders-my-account') }}</h2>
                        <hr>
                    </div>
                    @include('includes.side-menu')
                </div>
                <div class="col-12 col-lg-9 ">
                    <div class="heading">
                        <div class="d-flex justify-content-between">
                            <h2>
                                {{ trans('lables.header-account-balance') }} &nbsp; <div id="current-balance"></div>
                            </h2>
                            <button id="deposit-btn" class="btn btn-secondary">DEPOSIT</button>
                        </div>
                        <hr>
                    </div>
                    
                    {{-- deposit form --}}
                    <div id="deposit-form" class="pb-6">
                        <div class="row">
                            <div class="col-12 col-lg-6 d-none d-lg block d-xl-block">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-12 mb-3">
                                            <label for="">Amount (in IDR)</label>
                                            <input id="amount" type="number" class="form-control" name="amount" min="1" placeholder="Amount do you want to deposit to your account">
                                        </div>
                                        
                                        <div class="form-group col-12 mb-3">
                                            <label for="">Billing Phone</label>
                                            <input id="billing_phone" type="text" class="form-control" name="billing_phone" placeholder="Billing Phone Number">
                                        </div>
                                    </div>

                                    <div>
                                        <button id="payDeposit" class="btn btn-secondary">DEPOSIT</button>
                                    </div>
                                </form>
                                
                                <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
                                    <div class="toast" role="alert" aria-live="assertive"
                                        aria-atomic="true" data-autohide="false">
                                        <div class="toast-header">
                                            <strong class="mr-auto">Success!</strong>
                                            <small>Just now</small>
                                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="toast-body">
                                            Deposit processed successfully!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <table class="table balance-table">
                        <thead>
                            <tr class="d-flex">
                                <th class="col-12 col-md-2">{{ trans('lables.balance-id') }}</th>
                                <th class="col-12 col-md-2">{{ trans('lables.balance-amount') }}</th>
                                <th class="col-12 col-md-2">{{ trans('lables.balance-type') }}</th>
                                <th class="col-12 col-md-2">{{ trans('lables.balance-payment-method') }}</th>
                                <th class="col-12 col-md-2">{{ trans('lables.balance-date') }}</th>
                            </tr>
                        </thead>
                        <tbody id="balance-show">
                            {{--  --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <template id="balance-show-template">
        <tr class="d-flex">
            <td class="col-12 col-md-2 balance-no"></td>
            <td class="col-12 col-md-2 balance-amount"></td>
            <td class="col-12 col-md-2 balance-type"></td>
            <td class="col-12 col-md-2 balance-payment-method"></td>
            <td class="col-12 col-md-2 balance-date"></td>
        </tr>
    </template>
@endsection
@section('script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
        if (loggedIn != '1') {
            window.location.href = "{{ url('/') }}";
        }

        languageId = localStorage.getItem("languageId");
        if (languageId == null || languageId == 'null') {
            localStorage.setItem("languageId", '1');
            $(".language-default-name").html('Endlish');
            localStorage.setItem("languageName", 'English');
            languageId = 1;
        }

        cartSession = $.trim(localStorage.getItem("cartSession"));
        if (cartSession == null || cartSession == 'null') {
            cartSession = '';
        }
        loggedIn = $.trim(localStorage.getItem("customerLoggedin"));
        customerToken = $.trim(localStorage.getItem("customerToken"));
        customerId = $.trim(localStorage.getItem("customerId"));

        $(document).ready(function() {
            getCurrentBalance();
            getCustomerBalanceHistories();

            $('#deposit-form').hide()
            
            $('#deposit-btn').click(function () {
                $('#deposit-form').show()
            })

            $('#payDeposit').click(function (e) {
                e.preventDefault()

                const midtransOrderId = 'DEPO-' + Date.now() + (Math.floor(Math.random() * 900) + 100) + localStorage.getItem("customerId")

                const amount = $('#amount').val()
                const billingPhone = $('#billing_phone').val()

                const depositData = {
                    type: 'deposit',
                    total: amount,
                    payment_method: 'midtrans',
                    midtrans_order_id: midtransOrderId,
                }

                // generate snap token data
                const snapTokenData = {
                    order_id: midtransOrderId,
                    gross_amount: amount,
                    items: [
                        {
                            name: "Balance Deposit",
                            amount,
                            quantity: 1,
                            price: amount,
                        }
                    ],
                    customer: {
                        name: `${localStorage.getItem("customerFName")} ${localStorage.getItem("customerLName")}`,
                        email: localStorage.getItem("customerEmail"),
                        phone: billingPhone
                    }
                }

                const generateSnapTokenUrl = '/api/client/order/get-snap-token'
                $.ajax({
                    type: 'post',
                    url: generateSnapTokenUrl,
                    data: snapTokenData,
                    headers: {
                        'Authorization': 'Bearer ' + customerToken,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                        clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                    },
                    success: function (generatedSnapToken) {
                        const snapToken = generatedSnapToken

                        snap.pay(snapToken, {
                            onSuccess: function(result) {
                                console.log('[MIDTRANS SUCCESS]:', result)

                                updateBalance(depositData, snapToken)
                            },
                            onPending: function(result) {
                                console.log('[MIDTRANS PENDING]:', result)

                                toastr.error("{{ trans('lables.order-pay-canceled') }}");
                            },
                            onError: function(result) {
                                console.log('[MIDTRANS ERROR]:', result)

                                toastr.error('Payment failed, please try again later or contact us!');
                            }
                        });
                    }
                })
            })
        });

        function updateBalance(depositData, snapToken) {
            $.ajax({
                type: 'post',
                url: `{{ url('') }}/api/client/customer/balance/deposit`,
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                data: {
                    ...depositData,
                    snap_token: snapToken
                },
                success: function(result) {
                    toastr.success("Successfully deposit a balance to your account!");
                    setTimeout(() => {
                        window.location.href = "{{ url('/account-balance') }}";
                    }, 500);
                }
            })
        }

        function getCurrentBalance() {
            $.ajax({
                type: 'GET',
                url: "{{ url('') }}" + `/api/client/customer/balance/current-balance?language_id=${languageId}&currency=${localStorage.getItem("currency")}`,
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    $("#current-balance").text(`(Rp. ${data})`)
                },
                error: function(data) {},
            })
        }

        function getCustomerBalanceHistories() {
            $.ajax({
                type: 'get',
                url: "{{ url('') }}" + `/api/client/customer/balance?language_id=${languageId}&sortBy=id&sortType=DESC&currency=${localStorage.getItem("currency")}`,
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        const templ = document.getElementById("balance-show-template");

                        $("#balance-show").html('');

                        for (i = 0; i < data.data.length; i++) {
                            const clone = templ.content.cloneNode(true);

                            let transactionDate = data.data[i].transaction_date.split('T')[0]

                            clone.querySelector(".balance-no").innerHTML = data.data[i].balance_id;
                            clone.querySelector(".balance-date").innerHTML = transactionDate;
                            clone.querySelector(".balance-type").innerHTML = data.data[i].type;
                            clone.querySelector(".balance-payment-method").innerHTML = data.data[i].payment_method;

                            // let price = 0
                            // if (data.data[i].currency != null && data.data[i].currency != 'null' && data.data[i].currency != '') {
                            //     if (data.data[i].currency.symbol_position == 'left') {
                            //         price = (data.data[i].amount * +data.data[i].currency.exchange_rate);
                            //         price = data.data[i].currency.code + '' + price;
                            //     } else {
                            //         price = (data.data[i].amount * +data.data[i].currency.exchange_rate);
                            //         price = price + '' + data.data[i].currency.code;
                            //     }
                            // } else {
                            //     price = data.data[i].order_price;
                            // }

                            clone.querySelector(".balance-amount").innerHTML = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(data.data[i].amount).slice(0, -3)
                            
                            $("#balance-show").append(clone);
                        }
                    }
                },
                error: function(data) {},
            });
        }
    </script>
@endsection
