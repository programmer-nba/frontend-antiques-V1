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
    </style>
</head>
<body style="position: relative;">

    <div class="total" style="text-align:center;">
        <h1>บิลเงินสด/ใบรับเงิน</h1>
        <h4>เลขที่ใบเสร็จ {{$data['trackorder']}}</h4>

    </div>
    <div  style="position: absolute;top:0;right:0;">
            {{-- <p>Page 1 of 1</p> --}}
    </div>
    {{-- <table class="w-full">
        <tr>
            <td class="w-half">
                <img src="https://www.ilovepdf.com/img/ilovepdf/social/en-US/imagepdf.png" alt="laravel daily" width="200" />
            </td>
            <td class="w-half">
                <h2>Invoice ID: 834847473dd</h2>
            </td>
        </tr>
    </table> --}}
    <div class="margin-top">
        <table class="w-full" style="">
            <tr>
                <td style="width: 5%;">
                    <div>ข้าพเจ้า</div>
                </td>
                <td style="width: 55%;">
                    <div> {{$data["fullname_th"]}}</div>
                    <div>{{$data['address']}}</div>
                    <div>เลขที่บัตรประชาชน {{$data['id_card']}}</div>
                </td>
                <td  style="text-align: right;width: 30%;padding-right:20px;">
                    <div > <span>เลขที่รายการ</span></div>
                    <div>วันที่</div>
                </td>
                <td  style="text-align: right;width: 10%;">
                    <div class="line"> {{$data['queue']}}</div>
                    <div class="line"> {{$data['createAt']}}</div>
                </td>
            </tr>
        </table>
    </div>
    <div>
        ได้รับเงินจาก วงษ์พาณิชย์ สุขุมวิท 101/1 เลขที่3 ซ.วชิรธรรมสาธิต 16 แขวงบางนาเหนือ เขตบางนา กทม. <br>เลขประจำตัวผู้เสียภาษีอากร 3530900029188
    </div>

    <div class="margin-top">
        <table class="t1">
            <tr style="text-align: center">
                <th>ลำดับ</th>
                <th>รายการ</th>
                <th>จำนวน</th>
                <th>หน่วย</th>
                <th>หักออก</th>
                <th>จำนวนสุทธิ</th>
                <th>ราคา</th>
                <th>จำนวนเงิน</th>
            </tr>
            @foreach($data["orderList"] as $key => $item)


            <tr class="items" style="text-align:center;">
                    <td>
                        {{$key+1}}
                    </td>
                    <td style="text-align:left;">
                        {{ $item['description'] }}
                    </td>
                    <td>
                        {{ $item['qty'] }}
                    </td>
                    <td>
                        กิโล
                    </td>
                    <td>
                        0
                    </td>
                    <td>
                        {{ $item['qty'] }}
                    </td>
                    <td>
                        {{ round($item['total'] /  $item['qty'], 2) }}
                    </td>
                    <td>
                        {{  $item['total'] }}
                    </td>
            </tr>
            @endforeach
            <tr>
                <td class="sum" colspan="7" style="text-align: right">ยอดรวม</td>
                <td class="sum" style="text-align: center">{{$data['totalPrice']}}</td>
            </tr>
        </table>
    </div>

    <br><br>

    <div class=" margin-top">
        <table class="w-full" style="">
            <tr>
                <td style="width:33.33%;text-align:center;">
                    <div style="        border-bottom: 3px solid #000;
                    display: inline-block;
                    padding-bottom: 5px;
                    width: 10rem;

                "></div>
                    <div>ผู้จ่ายเงิน</div>
                </td>
                <td  style="width:33.33%;text-align:center;">
                    <div style="        border-bottom: 3px solid #000;
                    display: inline-block;
                    padding-bottom: 5px;
                    width: 10rem;

                "></div>
                    <div>ผู้บันทึก</div>
                </td>
                <td  style="width:33.33%;text-align:center;">
                    <div style="        border-bottom: 3px solid #000;
                    display: inline-block;
                    padding-bottom: 5px;
                    width: 10rem;

                "></div>
                    <div>ผู้รับเงิน</div>
                </td>
            </tr>
        </table>
    </div>
    <script type="text/javascript">
        window.onload = function() { window.print(); }
    </script>
</body>
</html>
