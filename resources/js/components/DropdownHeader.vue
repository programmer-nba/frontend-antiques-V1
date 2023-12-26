<template>
  <!-- <select
    :name="this.name"
    :id="this.id"
    class="form-control"
    :multiple="this.multiple"
    :model="this.vModel"
  >
    <slot></slot>
  </select> -->
  <!-- {{data}}
  <li v-for="d in JSON.parse(data)">@{{ d.category_id }}</li> -->
  <div class="row">
    <div class="col-md-8">
      <div v-for="d in JSON.parse(data)" style="display: inline-block">
        <button
          @click="toggleModal(d)"
          type="button"
          class="btn btn-square-md"
          style="
            background-color: green;
            color: white;
            font-size: 20px;
            width: 10vw !important;
            height: 12vh !important;
            box-shadow: 0em 0.5em 0.8em #d9d9d9;
          "
          :disabled="
            this.$store.state.dataOpen[0] == 'FINISH' ||
            this.$store.state.dataOpen[0] == 'APPROVE'
          "
        >
          {{ d.category_name_en }}/{{ d.category_name_th }}
        </button>
      </div>
    </div>
    <div class="col-md-4 text-center">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group row" style="margin-bottom: 0px">
            <label
              for="staticEmail"
              class="col-sm-5 text-right"
              style="margin: auto; width: 50%"
              >พนักงาน:
            </label>
            <div class="col-sm-7">
              <input
                type="text"
                readonly=""
                class="form-control"
                id="staticEmail"
                :value="this.username"
              />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row" style="margin-bottom: 0px">
            <label
              for="staticEmail"
              class="col-sm-7 text-right"
              style="margin: auto; width: 50%"
              >WHEREHOUSE:
            </label>
            <div class="col-sm-5">
              <input
                type="text"
                readonly=""
                class="form-control"
                id="staticEmail"
                value="WH Inside"
              />
            </div>
          </div>
        </div>
      </div>
      <br />
      <button
        type="button"
        class=""
        @click="save()"
        :disabled="
          this.$store.state.dataOpen[0] == 'FINISH' ||
          this.$store.state.dataOpen[0] == 'APPROVE'
        "
        style="
          background-color: red;
          border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 6vmin;
          margin: 4px 2px;
          cursor: pointer;
          box-shadow: 0em 0.5em 0.8em #d9d9d9;
        "
      >
        FINISH
      </button>
    </div>
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
                            <div v-if="product.detail_id == 17">
                              <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                  <button
                                    style="font-size: 25px; width: 60px; height: 60px"
                                    type="button"
                                    class="btn btn-danger"
                                    @click="amoung--"
                                  >
                                    -
                                  </button>
                                </div>
                                <div class="col-auto my-1">
                                  <label class="mr-sm-2" for="inlineFormCustomSelect"
                                    >จำนวน - Amoung (เข้าเป็นลัง)</label
                                  >
                                  <input
                                    class="form-control"
                                    type="number"
                                    min="0"
                                    v-model="amoung"
                                  />
                                </div>
                                <div class="col-auto my-1">
                                  <button
                                    style="font-size: 25px; width: 60px; height: 60px"
                                    type="button"
                                    class="btn btn-primary"
                                    @click="amoung++"
                                  >
                                    +
                                  </button>
                                </div>
                              </div>

                              <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                  <button
                                    style="font-size: 25px; width: 60px; height: 60px"
                                    type="button"
                                    class="btn btn-danger"
                                    @click="deduct--"
                                  >
                                    -
                                  </button>
                                </div>
                                <div class="col-auto my-1">
                                  <label
                                    class="mr-sm-2 text-danger"
                                    for="inlineFormCustomSelect"
                                    >จำนวน - Amoung (ตัดเป็นขวด)</label
                                  >
                                  <input
                                    class="form-control text-danger font-weight-bold"
                                    type="number"
                                    min="0"
                                    v-model="deduct"
                                  />
                                </div>
                                <div class="col-auto my-1">
                                  <button
                                    style="font-size: 25px; width: 60px; height: 60px"
                                    type="button"
                                    class="btn btn-primary"
                                    @click="deduct++"
                                  >
                                    +
                                  </button>
                                </div>
                              </div>

                              <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                  <label class="mr-sm-2" for="inlineFormCustomSelect"
                                    >ผลรวมทั้งหมด - Amoung (ขวด)</label
                                  >
                                  <input
                                    disabled
                                    class="form-control"
                                    type="number"
                                    min="0"
                                    v-model="num"
                                    style="
                                      font-size: 20px;
                                      color: blue;
                                      font-weight: bold;
                                    "
                                  />
                                </div>
                              </div>
                            </div>
                            <div v-if="product.detail_id != 17">
                              <div
                                class="form-row align-items-center"
                                style="justify-content: center"
                              >
                                <!-- <div class="col-auto my-1">
                                <button
                                  style="font-size: 25px; width: 60px; height: 60px"
                                  type="button"
                                  class="btn btn-danger"
                                  @click="num--"
                                >
                                  -
                                </button>
                              </div> -->
                                <div class="col-auto my-1">
                                  <label class="mr-sm-2" for="inlineFormCustomSelect"
                                    >จำนวน - Amoung (KG)</label
                                  >

                                  <input
                                    class="form-control"
                                    :id="product.detail_id + '-input'"
                                    type="text"
                                    @keyup.enter="onSelect(product)"
                                    v-model="num"
                                    style="
                                      font-size: 20px;
                                      color: blue;
                                      font-weight: bold;
                                    "
                                  />
                                </div>
                                <!-- <div class="col-auto my-1">
                                <button
                                  style="font-size: 25px; width: 60px; height: 60px"
                                  type="button"
                                  class="btn btn-primary"
                                  @click="num++"
                                >
                                  +
                                </button>
                              </div> -->

                                <table class="mt-3 text-center">
                                  <tr>
                                    <td>
                                      <button
                                        type="button"
                                        style="
                                          background-color: grey;
                                          color: white;
                                          border: 1px solid grey;
                                          font-size: 2rem;
                                          width: 4rem;
                                          height: 4rem;
                                        "
                                        @click="insert(1, product.detail_id)"
                                      >
                                        1
                                      </button>
                                    </td>
                                    <td>
                                      <button
                                        type="button"
                                        style="
                                          background-color: grey;
                                          color: white;
                                          border: 1px solid grey;
                                          font-size: 2rem;
                                          width: 4rem;
                                          height: 4rem;
                                        "
                                        @click="insert(2, product.detail_id)"
                                      >
                                        2
                                      </button>
                                    </td>
                                    <td>
                                      <button
                                        type="button"
                                        style="
                                          background-color: grey;
                                          color: white;
                                          border: 1px solid grey;
                                          font-size: 2rem;
                                          width: 4rem;
                                          height: 4rem;
                                        "
                                        @click="insert(3, product.detail_id)"
                                      >
                                        3
                                      </button>
                                    </td>
                                    <td>
                                      <button
                                        type="button"
                                        style="
                                          background-color: grey;
                                          color: white;
                                          border: 1px solid grey;
                                          font-size: 2rem;
                                          width: 4rem;
                                          height: 4rem;
                                        "
                                        @click="insert(4, product.detail_id)"
                                      >
                                        4
                                      </button>
                                    </td>
                                    <td>
                                      <button
                                        type="button"
                                        style="
                                          background-color: grey;
                                          color: white;
                                          border: 1px solid grey;
                                          font-size: 2rem;
                                          width: 4rem;
                                          height: 4rem;
                                        "
                                        @click="insert(5, product.detail_id)"
                                      >
                                        5
                                      </button>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <button
                                        type="button"
                                        style="
                                          background-color: grey;
                                          color: white;
                                          border: 1px solid grey;
                                          font-size: 2rem;
                                          width: 4rem;
                                          height: 4rem;
                                        "
                                        @click="insert(6, product.detail_id)"
                                      >
                                        6
                                      </button>
                                    </td>
                                    <td>
                                      <button
                                        type="button"
                                        style="
                                          background-color: grey;
                                          color: white;
                                          border: 1px solid grey;
                                          font-size: 2rem;
                                          width: 4rem;
                                          height: 4rem;
                                        "
                                        @click="insert(7, product.detail_id)"
                                      >
                                        7
                                      </button>
                                    </td>
                                    <td>
                                      <button
                                        type="button"
                                        style="
                                          background-color: grey;
                                          color: white;
                                          border: 1px solid grey;
                                          font-size: 2rem;
                                          width: 4rem;
                                          height: 4rem;
                                        "
                                        @click="insert(8, product.detail_id)"
                                      >
                                        8
                                      </button>
                                    </td>
                                    <td>
                                      <button
                                        type="button"
                                        style="
                                          background-color: grey;
                                          color: white;
                                          border: 1px solid grey;
                                          font-size: 2rem;
                                          width: 4rem;
                                          height: 4rem;
                                        "
                                        @click="insert(9, product.detail_id)"
                                      >
                                        9
                                      </button>
                                    </td>
                                    <td colspan="3">
                                      <button
                                        type="button"
                                        style="
                                          background-color: grey;
                                          color: white;
                                          border: 1px solid grey;
                                          font-size: 2rem;
                                          width: 4rem;
                                          height: 4rem;
                                        "
                                        @click="insert(0, product.detail_id)"
                                      >
                                        0
                                      </button>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="1">
                                      <button
                                        type="button"
                                        style="
                                          background-color: grey;
                                          color: white;
                                          border: 1px solid grey;
                                          font-size: 2rem;
                                          width: 4rem;
                                          height: 4rem;
                                        "
                                        @click="insert('.', product.detail_id)"
                                      >
                                        .
                                      </button>
                                    </td>
                                    <td>
                                      <button
                                        type="button"
                                        style="
                                          background-color: grey;
                                          color: white;
                                          border: 1px solid grey;
                                          font-size: 2rem;
                                          width: 4rem;
                                          height: 4rem;
                                        "
                                        @click="clean(product.detail_id)"
                                      >
                                        C
                                      </button>
                                    </td>
                                    <td>
                                      <button
                                        type="button"
                                        style="
                                          background-color: grey;
                                          color: white;
                                          border: 1px solid grey;
                                          font-size: 2rem;
                                          width: 5rem;
                                          height: 4rem;
                                        "
                                        @click="back(product.detail_id)"
                                      >
                                        DEL
                                      </button>
                                    </td>

                                    <td colspan="2">
                                      <!-- <button
                              data-dismiss="modal"
                              @click="() => onSelect(product)"
                              type="button"
                              class="btn btn-success float-right btn-lg"
                            >
                              <i class="fa fa-save mr-2"></i>บันทึก
                            </button> -->
                                      <button
                                        type="button"
                                        style="
                                          background-color: green;
                                          color: white;
                                          border: 1px solid green;
                                          font-size: 2rem;
                                          width: 100%;
                                          height: 4rem;
                                        "
                                        @click="onSelect(product)"
                                      >
                                        <i class="fa fa-save mr-2"></i>บันทึก
                                      </button>
                                    </td>
                                  </tr>
                                </table>
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
import { ref, onMounted } from "vue";

export default {
  props: ["name", "id", "multiple", "vModel", "data", "username"],
  data() {
    return {
      myRnId: parseInt(Date.now() * Math.random()),
      active: false,
      show: false,
      num: "",
      deduct: 0,
      amoung: 0,
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
    $(document).on("show.bs.modal", ".modal", function (e) {
      self.num = "";
      setTimeout(function () {
        $(e.target).find('input[type="text"]').focus();
      }, 500);
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
  watch: {
    // mul() {
    //     console.log(this.$store.state.customers)
    //     alert("ff")
    // }
    amoung() {
      this.num = this.amoung * 12 - this.deduct;
    },
    deduct() {
      this.num = this.amoung * 12 - this.deduct;
    },
  },
  methods: {
    focusFirstInput() {
      console.log("abc", this.$refs.inputTest);
      let first = this.inputs[0];
      let firstInput = this.$refs[first][0];
      firstInput.focus();
    },
    handleClick() {
      //   this.inputs.push("newInput");
    },
    getLastQueue() {
      const config = {
        method: "get",
        url: process.env.MIX_DEV_API + "/order/getlastqueue",
        headers: {
          "ngrok-skip-browser-warning": "true",
          // Add any other headers as needed
        },
        // Other configuration options can be added here
      };

      // Make the request
      axios(config)
        .then((response) => {
          this.$store.dispatch("loadQueueAndDate", [
            response.data.data,
            new Date().toISOString().slice(0, 10),
          ]);

          this.$store.dispatch("loadItems", []);

          console.log("test", this.$store.state.queueDate);
        })
        .catch((error) => {
          // Handle errors
          console.error("Error:", error);
        });
    },
    save: async function () {
      //         console.log(this.$store.state.items)
      //         console.log(this.$store.state.customers)
      //         this.datas = this.$store.state.items;
      //         this.totalTaxes = this.datas.reduce(function (sum, tax) {
      //     return sum + tax.total;
      // }, 0);

      $("#modal-loading").modal("show");
      const self = this;
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

          this.$swal({
            title: "เพิ่มรายการข้อมูลสำเร็จ!",
            icon: "success",
          }).then(function () {
            self.getLastQueue();
          });

          //   setTimeout(() => {
          //     window.location.reload();
          //   }, 5000);
        })
        .catch((err) => {
          $("#modal-loading").modal("hide");
          this.$swal({
            title: "เกิดข้อผิดพลาด",
            icon: "warning",
          }).then(function () {
            window.location.reload();
          });
        });
    },

    test(id) {
      alert(id);
      alert("dd");
    },
    onEnter: function () {
      alert("Enter");
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
    async onSelect(item) {
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
        image: this.myRnId + "-" + this.$store.state.items.length,
      });
      localStorage.storedData = JSON.stringify(clickedItems);

      $("#modal-loading").modal("show");

      if (false) {
        try {
            await axios
          .post(
            process.env.MIX_CAMERA_API,
            {
              // createAt : this.$store.state.queueDate[1],
              // queue: this.$store.state.queueDate[0],
              name: this.myRnId + "-" + this.$store.state.items.length,
            },
            {
              headers: {
                "ngrok-skip-browser-warning": "true",
              },
            }
          )
          .then((response) => {
            //sdfsdfsdfsd

            this.$store.dispatch(
              "loadItems",
              this.$store.state.items.concat(clickedItems)
            );
            //         $(".modal").modal("hide"); // closes all active pop ups.
            // $(".modal-backdrop").remove(); // removes the grey overlay.

            $("#modal-loading").modal("hide");
            this.saveafterfinish();
          });
        } catch (error) {
            this.$swal({
            title:error,
            icon: "success",
          }).then(function () {
            self.getLastQueue();
          });        }

      } else {
        this.$store.dispatch("loadItems", this.$store.state.items.concat(clickedItems));
        $("#modal-loading").modal("hide");
        this.saveafterfinish();
      }

      // return;

      try {
        // await axios
        //     .post(
        //         process.env.MIX_CAMERA_API,
        //       {
        //         // createAt : this.$store.state.queueDate[1],
        //         // queue: this.$store.state.queueDate[0],
        //         name: this.myRnId+"-"+this.$store.state.items.length
        //       },
        //       {
        //         headers: {
        //           "ngrok-skip-browser-warning": "true",
        //         },
        //       }
        //     )
        //     .then((response) => {
        //         //sdfsdfsdfsd
        //         this.$store.dispatch("loadItems", this.$store.state.items.concat(clickedItems));
        //         $('#modal-loading').modal('hide');
        //     }).catch(function(error){
        //         console.log(error)
        // this.$store.dispatch("loadItems", this.$store.state.items.concat(clickedItems));
        // $(".modal").modal("hide"); // closes all active pop ups.
        // $(".modal-backdrop").remove(); // removes the grey overlay.
        // this.saveafterfinish()
      } catch (error) {
        $("#modal-loading").modal("hide");
      }

      //test

      console.log(this.clickedItems);
    },
    async saveafterfinish() {
      $("#modal-loading").modal("show");

      await axios
        .post(
          process.env.MIX_DEV_API + "/order/saveafterfinish",
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
          $(".modal").modal("hide"); // closes all active pop ups.
          $(".modal-backdrop").remove(); // removes the grey overlay.
          //     this.$swal({
          //     title: "บันทึกรายการข้อมูลสำเร็จ!",
          //     icon: "success",
          //   }).then(function () {

          //     // window.location.reload();
          //   });
        });
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
          this.mul = response.data.data;
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
