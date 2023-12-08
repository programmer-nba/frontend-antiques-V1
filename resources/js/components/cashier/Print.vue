<template>
     <div class="row">
                            <div class="col-md-7">
                                <div class="">


                                    <div class="card-body">
                                        <form>
                                            <!-- <a @click="print" class="btn btn-primary mr-2"><i
                                                    class="fa fa-print mr-2"></i>PRINT
                                                REPORT</a> -->
                                            <button @click="print" type="button" class="btn btn-primary mr-2"><i class="fa fa-print mr-2"></i>ออกใบเสร็จรับเงิน</button>
                                            <!-- <button class="btn btn-primary mr-2"><i
                                                    class="fa fa-print mr-2"></i>พิมพ์บัตรประชาชน</button>
                                            <button class="btn btn-secondary mt-2"><i class="fa fa-print mr-2"></i>Paid Details
                                                Report</button> -->
                                            <br><br>
                                            <div class="row">
                                                <div class="col-sm-4">

                                                    <div class="form-group">
                                                        <label>เลขที่ใบเสร็จ</label>
                                                        <input type="text" class="form-control" placeholder="Enter ...">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Record by</label>
                                                        <input type="text" class="form-control" placeholder="Enter ...">

                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Paid by</label>
                                                        <input readonly type="text" class="form-control" placeholder="Enter ..." :value="this.username">

                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="">


                                    <div class="card-body">
                                        <!-- <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Amount</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Deduct</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Sell/ขายหักบิล</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                            </div>
                                        </div> -->
                                        <!-- <div class="form-group row">

                                            <div class="col-sm-9">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                              Vat
                                                            </label>
                                                          </div>

                                                    </div>
                                                    <br><br>
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option1" checked>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                              Include Vat
                                                            </label>
                                                          </div>

                                                    </div>
                                                    <div class="col-md-5" style="display: inline-block;">
                                                        <input style="display: inline-block;width:4rem;" type="password"
                                                            class="form-control" id="inputPassword" placeholder="Password">
                                                        <span style="display: inline-block;">&nbsp;%</span>


                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="password" class="form-control" id="inputPassword"
                                                            placeholder="Password">

                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Total/ยอดรวม</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" id="inputEmail3" placeholder="" :value="sum">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
</template>
<script>
export default {
    props: [ "username"],
  data() {
    return {
        a: 1,
        orderId: '',
    };
  },
  async mounted(){

  },
  computed: {
    sum() {


        return this.$store.state.items.reduce((accumulator, currentValue) => accumulator + currentValue.total, 0).toFixed(2);

    },
},
  created() {},
  methods: {
    print: async function () {
        const self = this;
    await axios.post(process.env.MIX_DEV_API + "/order/getorderbydateandqueue",{
            createAt : this.$store.state.queueDate[1],
            queue: this.$store.state.queueDate[0]
        } ,{
            headers: {
                "ngrok-skip-browser-warning": "true",
            }
        }).then((res)=>{
            self.orderId = res.data.data[0].orderId

            window.open('/cashier/print/receiptorder?id='+self.orderId, '_blank');

        });
    },
  },
};
</script>
