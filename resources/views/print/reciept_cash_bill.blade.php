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
    </div>
    <div  style="position: absolute;top:0;right:0;">
        <p>Page 1 of 1</p>
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
                    <div> นายสุพล โสภศรี</div>
                    <div>เลขที่ 19 ซ.อุดมสุข 22 แขวงบางนาเหนือ เขตบางนา กทม.</div>
                    <div>เลขที่บัตรประชาชน 1100201391951</div>
                </td>
                <td  style="text-align: right;width: 30%;padding-right:20px;">
                    <div > <span>เลขที่รายการ</span></div>
                    <div>วันที่</div>
                </td>
                <td  style="text-align: right;width: 10%;">
                    <div class="line"> 39</div>
                    <div class="line"> 29/11/2023</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="margin-top">
        <table class="products">
            <tr>
                <th>Qty</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            <tr class="items">
                @foreach($data as $item)
                    <td>
                        {{ $item['quantity'] }}
                    </td>
                    <td>
                        {{ $item['description'] }}
                    </td>
                    <td>
                        {{ $item['price'] }}
                    </td>
                @endforeach
            </tr>
        </table>
    </div>

    <div class="total">
        Total: $129.00 USD
    </div>

    <div class="footer margin-top">
        <div>Thank you</div>
        <div>&copy; Laravel Daily</div>
    </div>
</body>
</html>
