<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>รายงานสรุปการซื้อ/ตามวันที่
    </title>
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
</head>
<body>
    <h5>รายงานสรุปการซื้อ/ตามเลขที่</h5>
    <h5>วันที่ {{request()->datestart}} ถึง {{request()->datestop}}</h5>
    <table id="example" class=" t1" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">ลำดับ</th>
                <th>เลขที่รายการ</th>
                <th class="text-center">วันที่</th>
                <th class="text-center">ชื่อผู้ขาย</th>
                <th  class="text-center" colspan="2" rowspan="3">รายการ</th>

                <th  class="text-center" rowspan="3">จำนวน</th>
                <th  class="text-center">ราคา</th>
                <th  class="text-center">จำนวนเงิน</th>
                <th  class="text-center">หักออก</th>
                <th  class="text-center">Vat</th>
                <th  class="text-center">จำนวนเงินสุทธิ</th>

            </tr>
        </thead>
        <tbody>
            @for ($i=0; $i<2; $i++)

            <tr>
                <td rowspan="3" >1</td>
                <td rowspan="3" >66REC1104001</td>
                <td rowspan="3" >04/11/2023</td>
                <td rowspan="3" >general1 ทั่วไป - A</td>
                <td rowspan="1" colspan="1" style="border-right: unset">
                1

                </td>
                <td rowspan="1" colspan="1" style="border-left: unset">
                   ผ้าใส - 1001 lorem
                </td>
                <td rowspan="1" colspan="1">
                    4.70

                    </td>
                    <td rowspan="1" colspan="1">
                       3.90
                    </td>
                    <td rowspan="1" colspan="1">
                        37.35
                     </td>
                     <td rowspan="1" colspan="1">

                     </td>
                     <td rowspan="1" colspan="1">

                     </td>
                     <td rowspan="1" colspan="1">
                        37.85
                     </td>
                {{-- <td>01/11/2023</td>
                <td>30768.00</td>
                <td></td>
                <td></td>
                <td>30768.00</td>
                <td></td>
                <td>30768.00</td> --}}

            </tr>
            <tr>
                <td rowspan="1" colspan="1" style="border-right: unset">
                    2

                    </td>
                    <td rowspan="1" colspan="1" style="border-left: unset">
                       กระป๋อง - 5601
                    </td>
                    <td rowspan="1" colspan="1">
                        1.00
                     </td>
                     <td rowspan="1" colspan="1">
                        42.00
                     </td>
                     <td rowspan="1" colspan="1">
                        42.00
                     </td>
                     <td rowspan="1" colspan="1">

                     </td>
                     <td rowspan="1" colspan="1">

                     </td>
                     <td rowspan="1" colspan="1">
                        43.00
                     </td>
            </tr>
            <tr>
                <td rowspan="1" colspan="4" style="text-align: right">
                    ยอดรวม

                    </td>

                     <td rowspan="1" colspan="1">
                        79.00
                     </td>
                     <td rowspan="1" colspan="1">
                        0.00
                     </td>
                     <td rowspan="1" colspan="1">
                        0.00
                     </td>
                     <td rowspan="1" colspan="1">
                        79.00
                     </td>
            </tr>
            @endfor
        </tbody>
    </table>

    <script type="text/javascript">
        window.onload = function() { window.print(); }
    </script>
</body>
</html>
