<template>
    <div  style="overflow-x:auto;height: 36vh;
   overflow-y: auto;">
       <table class="table table-bordered" style="    ">
                                   <thead style="background-color:blueviolet;color:white;">
                                       <tr class="text-center">
                                           <th>ProductID</th>
                                           <th>Description</th>
                                           <th>Qty</th>
                                           <th>DeductQty</th>
                                           <th>Net Qty</th>
                                           <th>UM</th>
                                           <th>Amount</th>
                                           <th>DeductAmt</th>
                                           <th>Total</th>
                                           <th></th>
                                       </tr>
                                   </thead>
                                   <tbody>

                                       <tr class="text-center" v-for="(value, i) in datas" :key="i">
                                           <td>{{i+1}}</td>
                                           <td class="text-left">{{value.description}}</td>
                                           <td>{{value.qty}}</td>
                                           <td></td>
                                           <td></td>
                                           <td>กิโล</td>
                                           <td></td>
                                           <td>0</td>
                                           <td>{{value.total}}</td>
                                           <td >
<!-- <button type="" class="btn btn-warning"><i class="fa fa-edit mr-2"></i>แก้ไข</button> -->
<modal
                          :modal-id="'test'+i"
                          title="แก้ไขรายการสินค้า"
                          button-text="แก้ไข"
                          class-name="btn btn-sm btn-warning"
                          icon-name="fa fa-edit"
                        >
                        <input
                                type="email"
                                disabled
                                class="form-control"
                                id="exampleInputEmail1"
                                aria-describedby="emailHelp"
                                placeholder="Enter email"
                                :value="
                                  value.description +
                                  '-' +
                                  value.detail_id
                                "
                              />
                        <div class="form-row align-items-center">
                              <div class="col-auto my-1">
                                <button
                                  style="font-size: 25px; width: 60px; height: 60px"
                                  type="button"
                                  class="btn btn-danger"
                                  @click="datas[i].qty--"
                                >
                                  -
                                </button>
                              </div>
                              <div class="col-auto my-1">
                                <label class="mr-sm-2" for="inlineFormCustomSelect"
                                  >Product Description</label
                                >
                                <input
                                  class="form-control"
                                  type="number"
                                  min="0"
                                  v-model="datas[i].qty"
                                />
                              </div>
                              <div class="col-auto my-1">
                                <button
                                  style="font-size: 25px; width: 60px; height: 60px"
                                  type="button"
                                  class="btn btn-primary"
                                  @click="datas[i].qty++"
                                >
                                  +
                                </button>
                              </div>
                            </div>
                            <br />

                            <!-- <table class="table table-bordered">
                              <tbody>
                                <tr>
                                  <td><b>Total Qty</b></td>
                                  <td>
                                    <input
                                      style="
                                        color: red;
                                        font-weight: bold;
                                        font-size: 21px;
                                      "
                                      type="email"
                                      disabled
                                      class="form-control"
                                      id="exampleInputEmail1"
                                      aria-describedby="emailHelp"
                                      placeholder="Enter email"
                                      :value="num * mul"
                                    />
                                  </td>
                                </tr>
                              </tbody>
                            </table> -->
                            <br />
                            <button
                              data-dismiss="modal"
                              @click="() => onSelect(product)"
                              type="button"
                              class="btn btn-success float-right btn-lg"
                            >
                              <i class="fa fa-save mr-2"></i>บันทึก
                            </button>

                         </modal
                        >&nbsp;&nbsp;
                                            </td>

                                       </tr>

                                   </tbody>
                               </table>
    </div>
                               <br>
<!-- <div class="row">
   <div class="col-md-4">

       </div>
       <div class="col-md-2">

</div>
<div class="col-md-6">
   <div class="form-group row" style="margin-bottom: 0px;    margin-bottom: 0px;margin-top: -12px;

   ">
   <label for="staticEmail" class="col-sm-6" style=""><span>Weight:</span> <span style="    font-size: 28px;">25.48 KG</span>  </label>
   <label for="staticEmail" class="col-sm-6" style=""><span>Total:</span> <span style="    font-size: 28px;">                                {{totalTaxes}}
</span> </label>


   </div>

</div>

</div> -->
</template>

<script>
import select2 from "select2";

export default {
 props: ["name", "id", "multiple", "vModel", "data"],
 data() {
   return {
     active: false,
     show: false,
     num: 0,
     items: [
       { text: "foo", value: "bar" },
       { text: "bar", value: "biz" },
       { text: "buzz", value: "buzz" },
     ],
     datas: [],
     totalTaxes:0,
   };
 },

 mounted: function () {
   // this.datas  = JSON.parse(localStorage.storedData);
   this.datas = this.$store.state.items;
   console.log("11111111111111")
   console.log("dat", this.datas)
   // context.commit('MUTATE_ITEMS', items);
   this.$store.dispatch('loadItems',this.datas)
   console.log(this.$store.state.items)
 },
 computed: {
   datas () {
       this.datas = this.$store.state.items;
       this.totalTaxes = this.datas.reduce(function (sum, tax) {
   return sum + tax.total;
}, 0);
   // alert(this.totalTaxes)
       console.log("9999")
     return this.$store.state.items
   }
 },
 methods: {
    async onSelect(item) {
      this.show = false;
      this.active = false;
      this.$store.dispatch('loadItems',this.datas)

      //save spiderman
      $('#modal-loading').modal('show');

      await axios
        .post(
          process.env.MIX_DEV_API + "/order/createOrder",
          {
            customers: this.$store.state.customers,
            items: this.$store.state.items,
            createAt : this.$store.state.queueDate[1],
            queue: this.$store.state.queueDate[0]
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {
            $('#modal-loading').modal('hide');
        });

    },
   async toggleModal() {
     const self = this;

     await axios.get("https://dummyjson.com/products").then(function (res) {
       const body = document.querySelector("body");
       self.active = !self.active;
       self.active
         ? body.classList.add("modal-open")
         : body.classList.remove("modal-open");
       setTimeout(() => (self.show = !self.show), 10);
     });
   },
   test(id) {
     // let api_url = process.env.MIX_API_KEY;
     // alert(api_url)
   },
 },
};
</script>

<style>
.select2-selection.select2-selection--multiple {
 line-height: 1.5 !important;
 color: #495057 !important;
 background-color: #fff !important;
 background-clip: padding-box !important;
 border: 1px solid #ced4da !important;
 border-radius: 0.25rem !important;
}
@import "datatables.net-dt";
</style>
