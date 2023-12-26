<template>
  <div class="row">
    <div class="col-md-12">
      <div v-for="d in JSON.parse(data)" style="display: inline-block">
        <button
          :disabled="this.$store.state.dataOpen[0] == 'APPROVE'"
          @click="toggleModal(d)"
          type="button"
          class="btn btn-square-md"
          style="
            background-color: grey;
            color: white;
            font-size: 16px;
            width: 100px !important;
            box-shadow: 0em 0.5em 0.8em #d9d9d9;
          "
        >
          {{ d.category_name_en }}/{{ d.category_name_th }}
        </button>
      </div>
      <button
        :disabled="this.$store.state.dataOpen[0] == 'APPROVE'"
        type="button"
        class="btn btn-square-md"
        @click="save()"
        style="
          background-color: green;
          color: white;
          font-size: 16px;
          width: 100px !important;
          box-shadow: 0em 0.5em 0.8em #d9d9d9;
        "
      >
        <img
          src="https://drive.google.com/uc?export=view&id=1rCZKbIuyvzV1fd0CdTVw5S2p3grcmirs"
          style="width: 40px; height: 40px"
        />

        Cashier/จ่ายเงิน
      </button>
    </div>
    <!-- <div class="col-md-12 text-right">

      <br />

      <button
        type="button"
        class=""
        @click="save()"
        style="
          background-color: green;
          border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 45px;
          margin: 4px 2px;
          cursor: pointer;
          box-shadow: 0em 0.5em 0.8em #d9d9d9;
        "
      >
        Cashier/จ่ายเงิน
      </button>
    </div> -->
  </div>

  <div>
    <!-- <button type="button" class="btn btn-primary" @click="toggleModal">My Modal</button> -->
    <div
      ref="modal"
      class="modal fade"
      :class="{ show, 'd-block': active }"
      tabindex="-1"
      role="dialog"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">กรุณาเลือกรายการสินค้า</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
              @click="toggleModal"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card card-secondary">
              <div class="card-header">Paper/กระดาษ</div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead style="background-color: blueviolet; color: white">
                    <tr>
                      <th>ID</th>
                      <th>รายการ</th>
                      <th>Remark</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="product in productDetails[0]">
                      <td>{{ product.detail_id }}</td>
                      <td>{{ product.detail_name_th }}</td>
                      <td>{{ product.detail_name_en }}</td>
                      <td @click="test(product.detail_id)">
                        <modal
                          :modal-id="'test' + product.detail_id"
                          title="เพิ่มรายการสินค้า"
                          button-text="เลือก"
                          class-name="btn btn-success"
                          icon-name="fa fa-plus"
                        >
                          <form
                            role="form"
                            method="POST"
                            action="{{route('product_files.store')}}"
                          >
                            <div class="form-group">
                              <label for="exampleInputEmail1">Product description</label>
                              <input
                                type="email"
                                disabled
                                class="form-control"
                                id="exampleInputEmail1"
                                aria-describedby="emailHelp"
                                placeholder="Enter email"
                                :value="
                                  product.detail_name_th +
                                  '-' +
                                  product.detail_name_en +
                                  '-' +
                                  product.detail_id
                                "
                              />
                              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>

                            <div class="form-row align-items-center">
                              <div class="col-auto my-1">
                                <button
                                  style="font-size: 25px; width: 60px; height: 60px"
                                  type="button"
                                  class="btn btn-danger"
                                  @click="num--"
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
                                  v-model="num"
                                />
                              </div>
                              <div class="col-auto my-1">
                                <button
                                  style="font-size: 25px; width: 60px; height: 60px"
                                  type="button"
                                  class="btn btn-primary"
                                  @click="num++"
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
                          </form> </modal
                        >&nbsp;&nbsp;
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-if="active" class="modal-backdrop fade show"></div>
  </div>
</template>

<script>
import select2 from "select2";

export default {
  props: ["name", "id", "multiple", "vModel", "data", "username"],
  data() {
    return {
      active: false,
      show: false,
      num: 0,
      mul: 0,
      items: [
        { text: "foo", value: "bar" },
        { text: "bar", value: "biz" },
        { text: "buzz", value: "buzz" },
      ],
      productDetails: [],
    };
  },

  mounted: function () {
    const self = this;
    $(document).on("show.bs.modal", ".modal", function () {
      self.num = 0;
    });

    // this.dataTemp = this.$store.state.items;
    var vm = this;

    $(this.$el)
      .select2()
      .trigger("change")
      .on("change", function () {
        let values = [];

        // Insert into array the value when is selected
        $(this)
          .find(":selected")
          .each(function (i, item) {
            values.push(item.textContent);
          });

        vm.$emit("input", values);
      });
  },
  destroyed: function () {
    $(this.$el).off().select2("destroy");
  },
  computed: {
    // mul() {
    //     console.log(this.$store.state.customers)
    //     alert("ff")
    // }
  },
  methods: {
    save: async function () {
      //         console.log(this.$store.state.items)
      //         console.log(this.$store.state.customers)
      //         this.datas = this.$store.state.items;
      //         this.totalTaxes = this.datas.reduce(function (sum, tax) {
      //     return sum + tax.total;
      // }, 0);
      await axios
        .post(
          process.env.MIX_DEV_API + "/order/approveorder",
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
          this.$swal({
            title: "จ่ายเงินสำเร็จ!",
            icon: "success",
          }).then(function () {
            window.location.reload();
          });

          setTimeout(() => {
            window.location.reload();
          }, 5000);
        });
    },
    test() {
      alert("dd");
    },
    onSelect(item) {
      this.show = false;
      this.active = false;
      console.log(this.$store.state.items);
      console.log("Uuuu", item);
      //   this.clickedItems.push(this.$store.state.items);
      var clickedItems = [];
      clickedItems.push({
        description: item.detail_name_th,
        qty: this.num,
        total: this.num * this.mul,
        detail_id: item.detail_id,
        unit: item.unit,
      });
      localStorage.storedData = JSON.stringify(clickedItems);
      this.$store.dispatch("loadItems", this.$store.state.items.concat(clickedItems));
      //test

      console.log(this.clickedItems);
    },
    async insert(num, id) {
      this.num = this.num + num;
      var len = this.num;

      setTimeout(function () {
        $("#" + id + "-input")
          .val("")
          .focus()
          .val(len);
      }, 0);
    },
    back(id) {
      this.num = this.num.substring(0, this.num.length - 1);
      var num = this.num;
      setTimeout(function () {
        $("#" + id + "-input")
          .val("")
          .focus()
          .val(num);
      }, 0);
    },
    clean(id) {
      this.num = "";
      $("#" + id + "-input").focus();
    },
    async toggleModal(item) {
      console.log(item);
      console.log("sssssssssssssssssssssssss");
      const self = this;

      //   await axios.get(process.env.MIX_DEV_API + "/getOrderData", {'category_id': 1}).then(function (res) {
      //     console.log(res)
      //   });

      await axios
        .post(
          process.env.MIX_DEV_API + "/getOrderData",
          {
            category_id: item.category_id,
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {
          console.log(response.data.getCateOrder);
          this.productDetails =
            response.data.getCateOrder[0].getCateOrder.all_cate.detail_data;
          console.log("produ", this.productDetails);
          const body = document.querySelector("body");
          self.active = !self.active;
          self.active
            ? body.classList.add("modal-open")
            : body.classList.remove("modal-open");
          setTimeout(() => (self.show = !self.show), 10);

          // return res.status(200).send({status: true, message: 'คืนค่าคอมมิชชั่นสำเร็จ'})
        })
        .catch((err) => {
          const body = document.querySelector("body");
          self.active = !self.active;
          self.active
            ? body.classList.add("modal-open")
            : body.classList.remove("modal-open");
          setTimeout(() => (self.show = !self.show), 10);
        });
    },
    async test(id) {
      console.log("jj", this.$store.state.customers.class);
      // alert(id)
      await axios
        .post(
          process.env.MIX_DEV_API + "/getdetailvendor",
          {
            detail_id: id,
            class: this.$store.state.customers.class,
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {
          console.log("aam", response.data);
          this.mul = response.data.data;
          // this.type = response.data.data[0].class;
          // this.$store.dispatch('loadCustomers',response.data.data[0]);
          // if(typeof this.$store.state.customers.class == 'undefined'){
          //     this.mul = response.data.data;
          // }else{
          //     this.mul = response.data.data;
          // }
          // console.log(this.$store.state.customers.class)
        });
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
