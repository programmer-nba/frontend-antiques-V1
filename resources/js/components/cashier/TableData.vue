<template>
  <div style="overflow-x: auto; height: 36vh; overflow-y: auto">
    <table class="table table-bordered" style="">
      <thead style="background-color: blueviolet; color: white">
        <tr class="text-center">
          <th>ProductID</th>
          <th>Description</th>
          <th>Qty</th>
          <th>UM</th>
          <th>Amount</th>
          <th>Total</th>
          <th>Image</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center" v-for="(value, i) in datas" :key="i">
          <td>{{ i + 1 }}</td>
          <td class="text-left">{{ value.description }}</td>
          <td>{{ value.qty }}</td>
          <td>กิโล</td>
          <td>0</td>
          <td>{{ value.total }}</td>
          <th>
            <img
              style="width: 70px; height: 70px"
              :src="`${cameraApi}/images/${value.image}.jpg`"
            />
          </th>
          <td>
            <!-- <button type="" class="btn btn-warning"><i class="fa fa-edit mr-2"></i>แก้ไข</button> -->
            <button
              type="button"
              @click="showData(value)"
              class="btn btn-primary btn-sm"
              style="display: inline"
            >
              <i class="fa fa-eye mr-2"></i>ดูข้อมูล</button
            >&nbsp;&nbsp;
            <div
              v-if="
                this.$store.state.dataOpen[0] != 'FINISH' &&
                this.$store.state.dataOpen[0] != 'APPROVE'
              "
              style="display: inline"
            >
              <modal
                :modal-id="'testcashier' + i"
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
                  :value="value.description + '-' + value.detail_id"
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
                      >Product Description (KG)</label
                    >
                    <input
                      class="form-control"
                      type="number"
                      min="0"
                      style="font-size: 20px; color: blue; font-weight: bold"
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
                </button> </modal
              >&nbsp;&nbsp;
            <button class="btn btn-danger btn-sm" @click="deleteProduct(value, i)">
              <i class="fa fa-trash mr-2"></i>ลบ
            </button>
        </div>

          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <br />
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

  <div
    class="modal fade"
    id="showDataTable"
    tabindex="-1"
    aria-labelledby="showDataTableLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="showDataTableLabel">รายการทั้งหมดของวันนี้</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div style="overflow-x: auto">
            <!-- <p>Response Data: {{ responseData }}</p> -->
            <h2> {{viewDetail[0]}}</h2>
            <table class="table table-striped">
              <thead>
                <tr v-for="(value, index) in viewDetail[1]">
                    <td>{{index+1}}</td>
                    <td>{{value.description}}</td>
                    <td>{{value.qty}}</td>
                    <td>{{value.unit}}</td>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
        <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
      </div>
    </div>
  </div>
</template>

<script>
import select2 from "select2";

export default {
  props: ["name", "id", "multiple", "vModel", "data"],
  data() {
    return {
      cameraApi: "",
      active: false,
      show: false,
      num: 0,
      items: [
        { text: "foo", value: "bar" },
        { text: "bar", value: "biz" },
        { text: "buzz", value: "buzz" },
      ],
      datas: [],
      totalTaxes: 0,
      viewDetail: []
    };
  },

  mounted: function () {
    this.cameraApi = process.env.MIX_CAMERA_API;
    // this.datas  = JSON.parse(localStorage.storedData);
    this.datas = this.$store.state.items;
    console.log("11111111111111");
    console.log("dat", this.datas);
    // context.commit('MUTATE_ITEMS', items);
    this.$store.dispatch("loadItems", this.datas);
    console.log(this.$store.state.items);
  },
  computed: {
    datas() {
      this.datas = this.$store.state.items;
      this.totalTaxes = this.datas.reduce(function (sum, tax) {
        return sum + tax.total;
      }, 0);
      // alert(this.totalTaxes)
      console.log("9999");
      return this.$store.state.items;
    },
  },
  methods: {
    async deleteProduct(value, key) {
      var text = `${value.description} จำนวน ${value.qty} ${value.unit}`;
      const self = this;
      this.$swal({
        title: "คุณต้องการลบรายการนี้หรือไม่?",
        text: text,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "ใช่, ฉันต้องการลบ!",
      }).then(async function (result) {
        if (result.value) {
          // <-- if confirmed
          try {
            self.$store.state.items = await self.$store.state.items.filter(function (
              value,
              key
            ) {
              return i != key;
            });
          } catch (error) {
            window.location.reload();
          }
        }
      });
    },
    async showData(value) {
        console.log("user value", value)
        $("#modal-loading").modal("show");
        this.viewDetail[0] = value.description;

await axios
  .post(
    process.env.MIX_DEV_API + "/order/viewdetailorder",
    {
      detail_id: value.detail_id,
      createAt: this.$store.state.queueDate[1],
      queue: this.$store.state.queueDate[0],
    },
    {
      headers: {
        "ngrok-skip-browser-warning": "true",
      },
    }
  )
  .then((response) => {
    this.viewDetail[1] = response.data.data[0].order_detail;
    $("#modal-loading").modal("hide");
    $("#showDataTable").modal("show");

  });
    },
    async onSelect(item) {
      this.show = false;
      this.active = false;
      this.$store.dispatch("loadItems", this.datas);

      //save spiderman
      $("#modal-loading").modal("show");

      await axios
        .post(
          process.env.MIX_DEV_API + "/order/createOrder",
          {
            customers: this.$store.state.customers,
            items: this.$store.state.items,
            createAt: this.$store.state.queueDate[1],
            queue: this.$store.state.queueDate[0],
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {
          $("#modal-loading").modal("hide");
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
