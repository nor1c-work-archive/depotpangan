<!DOCTYPE html>
<html>
<head>
    <title>Purchase Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .center {
            text-align: center;
        }
        
        .flex-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        
        .flex-left {
            flex: 1;
        }
        
        .flex-right {
            flex: 1;
            text-align: right;
        }
        
        hr {
            border: 1px solid #dddddd;
        }
        
        .bold {
            font-weight: bold;
        }
        
        .table-container {
            margin: 20px 0;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            border: 1px solid #dddddd;
        }
        
        thead {
            background-color: #f5f5f5;
        }
        
        .terms {
            padding: 20px;
        }
        
        .signature {
            text-align: right;
            margin-top: 40px;
        }

        .table-total tr, 
        .table-total td {
            border: hidden;
        }
    </style>
</head>
<body>
    <div class="center"><h2><b>DEPOT PANGAN</b></h2></div>
    
    <div class="flex-container">
        <div class="flex-left">
            <p>
                Jalan Sudirman No 15<br>
                (021) 23456789<br>
                billing@depotpangan.com
            </p>
        </div>
        <div class="flex-right">
            <p>
                 {{ $maildata['order_date'] }}<br>
                 PURCHASE ORDER NO: {{ $maildata['order_id'] }}
            </p>
        </div>
    </div>
    
    <hr>
    
    <div class="bold">INFORMASI PELANGGAN</div>
    <br>
    <div class="flex-container">
        <div class="flex-left">
            <p>
                {{ $maildata['customer_name'] }}<br>
                {{ $maildata['customer_address'] }}<br>
                {{ $maildata['customer_phone'] }}<br>
                {{ $maildata['customer_email'] }}
            </p>
        </div>
        <div class="flex-right">
            <p>
                CONTACT PERSON<br>
                {{-- Suryono/Staff Purchasing --}}
                -
            </p>
        </div>
    </div>
    
    <br>
    
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th style="width: 50%;">Item</th>
                    <th>Qty</th>
                    <th>Unit</th>
                    <th>Harga (Rp)</th>
                    <th>Total (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($maildata['items'] as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['unit'] }}</td>
                        <td>{{ number_format($item['price'], 0, '.', '') }}</td>
                        <td>{{ number_format($item['price']*$item['quantity'], 0, '.', '') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" rowspan="2" style="vertical-align: top;">
                        Syarat &amp; ketentuan
                        <ul>
                            <li>* Seluruh proses pengiriman barang harus disertai adanya faktur, nota atau kuitansi.</li>
                            <li>* Proses pelunasan dilakukan selambat-lambatnya 30 hari sejak barang diterima.</li>
                        </ul>
                    </td>
                    <td rowspan="2"></td>
                    <td colspan="3">
                        <table class="table-total">
                          <tr>
                            <td>Sub Total</td>
                            <td>{{ $maildata['grand_total'] }}</td>
                          </tr>
                          <tr>
                            <td>PPN 10%</td>
                            <td>-</td>
                          </tr>
                          <tr>
                            <td>Diskon 0%</td>
                            <td>-</td>
                          </tr>
                          <tr>
                            <td>Total</td>
                            {{-- <td>{{ $grand_total+$ppn-$discount }}</td> --}}
                            <td>{{ $maildata['grand_total'] }}</td>
                          </tr>
                        <table>
                          
                          <br><br><br>

                        Disetujui oleh,
                        <br><br>
                        <div class="center">Depot Pangan</div>
                        <div class="center">Manager Purchasing</div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>