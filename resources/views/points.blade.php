@extends('layouts.master')
@section('content')
    <!-- wishlist Content -->
    <section class="wishlist-content pro-content">

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="heading">
                        <h2>
                            {{ trans('lables.profile-my-account') }}
                        </h2>
                        <hr>
                    </div>

                    @include('includes.side-menu')

                </div>
                <div class="col-12 col-lg-9 ">
                    <div class="heading">
                        <h2>
                            Points
                        </h2>
                        <hr>
                    </div>

                    <div class="col-12 px-0 media-main" id="points-template">

                    </div>

                    <!-- ............the end..... -->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
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


        fetchPoints();

        function fetchPoints() {
            var url = "{{ url('') }}" +
                '/api/client/points';
            $.ajax({
                type: 'get',
                url: url,
                headers: {
                    'Authorization': 'Bearer ' + customerToken,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    clientid: "{{ isset(getSetting()['client_id']) ? getSetting()['client_id'] : '' }}",
                    clientsecret: "{{ isset(getSetting()['client_secret']) ? getSetting()['client_secret'] : '' }}",
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.status == 'Success') {
                        var html = "<div class='row'>";
                        html += "<div class='col-md-6' style='padding:6px !important'><b>Description</b></div>";
                        html += "<div class='col-md-6' style='padding:6px !important'><b>Points</b></div>";

                        for (i = 0; i < data.data.length; i++) {
                            html += "<div class='col-md-6' style='padding:6px !important'>" + data.data[i].description + "</div>";
                            html += "<div class='col-md-6' style='padding:6px !important'>" + data.data[i].points + "</div>";


                        }
                        html += "</div>";
                        $('#points-template').html(html);

                    }
                },
                error: function(data) {},
            });
        }
    </script>
@endsection
