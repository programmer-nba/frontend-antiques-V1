<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        body{
            font-family: "THSarabunNew";
        }
        h4 {
    margin: 0;
}
.w-full {
    width: 100%;
}
.w-half {
    width: 50%;
}
.margin-top {
    margin-top: 1.25rem;
}
.footer {
    font-size: 0.875rem;
    padding: 1rem;
    background-color: rgb(241 245 249);
}
table {
    width: 100%;
    border-spacing: 0;
}
table.products {
    font-size: 0.875rem;
}
table.products tr {
    background-color: rgb(96 165 250);
}
table.products th {
    color: #ffffff;
    padding: 0.5rem;
}

table.t1 th   {
    border: 1px solid black;
  border-collapse: collapse;

}

table.t1 td   {
    border: 1px solid black;
  border-collapse: collapse;

}

td.sum {
    height: 22px;;
}


table tr.items {
    background-color: rgb(241 245 249);
}
table tr.items td {
    padding: 0.5rem;
}
.total {
    text-align: right;
    margin-top: 1rem;
    font-size: 0.875rem;
}
td {
  vertical-align: top;
}
td {
  height: 70px;
}
.line {

             /* Increase this as per requirement */
             padding-bottom: 1px;
             border-bottom-style: solid;
             border-bottom-width: 3.1px;
             text-align: center;
         }

         .text-center{
            text-align: center;
         }
         .text-left{
            text-align: left;
         }
    </style>
</head>
<body style="position: relative;">
    <h5>รายงานสรุปการซื้อ/ตามสินค้า</h5>
    <h5>วันที่ {{request()->datestart ?? "ทั้งหมด"}} ถึง {{request()->datestop ?? "ทั้งหมด"}}</h5>
    <table id="example" class="table table-striped table-bordered t1" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">ลำดับ</th>
                <th>รายการ</th>
                <th class="text-center">หน่วย</th>
                <th class="text-center">จำนวนสุทธิ</th>
                <th class="text-center">จน.หักออก</th>
                <th class="text-center">ราคาเฉลี่ย</th>
                <th class="text-center">จำนวนเงิน</th>
                <th class="text-center">หักออก</th>
                <th class="text-center">จำนวนเงินสุทธิ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
            <tr class="text-center">
                <td>{{$key}}</td>
                <td class="text-left">{{$value["description"]}}</td>
                <td>{{$value["unit"]}}</td>
                <td>{{$value['qty']}}</td>
                <td></td>
                <td>                        {{ round($value['total'] /  $value['qty'], 2) }}
                </td>
                <td>{{$value['total']}}</td>
                <td></td>
                <td>{{$value['total']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script type="text/javascript">
        window.onload = function() { window.print(); }
    </script>
</body>
</html>
