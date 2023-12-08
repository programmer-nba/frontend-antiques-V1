<!DOCTYPE html>
<html>

<head>
    <title>PRINT REPORT</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <style>
            body {
                font-family: 'THSarabunNew ' !important;
line-height: normal;
            }
            table {
  width: 100%;
  border-collapse: collapse;
}
.box {
    width:100px;
    margin:auto;
    height:80px;
    border:1px solid black;
    margin-top:10px;
    text-align:center;
        vertical-align: middle;
}

.header {
    text-align:center;
    border:1px solid black;
}

.middle {
    line-height:60px;
    height:80px;
}

hr{
    border: 1px solid black;
    border-style: dotted;

}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {
  width: 21cm;
  height: 29.7cm;
}
page[size="A4"][layout="portrait"] {
  width: 29.7cm;
  height: 21cm;
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
tbody#data:before {
    content:"@";
    display:block;
    line-height:10px;
    text-indent:-99999px;
}

        </style>

</head>

<body onload="window.print()">
    <page >
    <table>
        <tr style="font-size:25px;text-align:center;" >
            <th>ใบเสร็จรับเงิน</th>
        </tr>
    </table><br>
    <table>

        <tr>
          <th>วงษ์พาณิชย์ สุขุมวิท 101/13 ซ.วิชรธรรมสาธิต 16<br> แขวงบางนาเหนือ เขตบางนา กทม.<br>
            โทร. 02-3989865<br>เปิด: 08:00 - 17:00 หยุดทุกวันพฤหัสฯ
        </th>
          <th class="text-right">

            <div class="box">
                <div class="header">เลขที่ตั๋ว</div>
                <span class="middle" style="font-size:40px;">{{$data['queue']}}</span>
            </div>
          </th>
        </tr>

      </table><br>
      <table>
        <tr style="text-align:left;" >
            <th>เวลาเปิดตั๋ว 10/03/2566 21:11</th>
            <th>เวลารับเงิน 10/03/2566 21:11</th>

        </tr>
    </table>
    <hr>
    <table>
        <tr style="text-align:left;" >
            <th>ชั่งโดย: test</th>
            <th>สั่งจ่ายโดย: test</th>

        </tr>
        <tr style="text-align:left;" >
            <th>ชื่อลูกค้า: {{$data['customer_name_th']}}</th>
        </tr>
    </table>
    <hr>
   <table style="
  border-collapse: collapse;
">


    </table>
    <table>
      <thead>
        <tr  style="text-align:center;border-bottom: 1px solid black;">
            <th style="text-align:left;">รายการ</th>
            <th>รวม</th>
            <th>หัก</th>
            <th>สุทธิ</th>
            <th>ราคา/หน่วย</th>
            <th>ราคารวม</th>
        </tr>

      </thead>
      <tbody id="data">
        @foreach ($data["orderList"] as $value)
        <tr  style="text-align:center;">
            <th style="text-align:left;">{{$value["description"]}}</th>
            <th>{{$value["qty"]}}</th>
            <th>0</th>
            <th>{{$value["qty"]}}</th>
            <th>{{$value["total"] / $value["qty"]}}</th>
            <th>{{$value["total"]}}</th>
        </tr>
        @endforeach
      </tbody>
        {{-- @dd($data) --}}




      </table><br>
      <table style="  border-top: 1px solid black;
      border-collapse: collapse;
    ">
        <tr  style="text-align:center;">
            <th style="text-align:left;"><br>การจ่ายเงิน: เงินสด</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th><br>รวมทั้งหมด {{$data['total']}}</th>
        </tr>
      </table><br><br>
      <table >
        <tr  style="text-align:center;">
            <th style="text-align:left;">ลงชื่อ:......................................................(ผู้รับเงิน)</th>
            <th style="text-align:left;">ลงชื่อ:......................................................(ผู้จ่าย)</th>
        </tr>
      </table>




</page>

<script type="text/javascript">
    window.onload = function() { window.print(); }
</script>

</body>


</html>
