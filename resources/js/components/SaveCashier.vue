<template>
   <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-danger btn-lg">
                                            <img src="{{ asset('images/buy.png') }}" style="width: 100px;height:100px;">
                                            <h4 class="mt-4">Sell/ขายหักบิล</h4>
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <button @click="save()" class="btn btn-success btn-lg">
                                            <img src="{{ asset('images/sell.png') }}" style="width: 100px;height:100px;">
                                            <h4 class="mt-4">Cashier/จ่ายเงิน</h4>
                                        </button>

                                    </div>
                                </div>
                            </div>
</template>
<script>
export default {
  data() {
    return { a: 1 }
  },
  created() {
  },
  methods: {
    save:async function(){
//         console.log(this.$store.state.items)
//         console.log(this.$store.state.customers)
//         this.datas = this.$store.state.items;
//         this.totalTaxes = this.datas.reduce(function (sum, tax) {
//     return sum + tax.total;
// }, 0);
        await axios
        .post(
          process.env.MIX_DEV_API + "/order/createOrder",
          {
            customers: this.$store.state.customers,
            items: this.$store.state.items
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {
            alert("บันทึกข้อมูลสำเรหกด่หกาส")
            window.location.reload();
        })
    }
  }
}
</script>
