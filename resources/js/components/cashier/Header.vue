<template>
  <div class="card-header" style="">
    <div class="row">
      <label class="control-label col-sm-2 col-md-1" for="email">เลขที่ใบเสร็จd:</label>
      <div class="col-sm-3 col-md-1">
        <input
          type="email"
          class="form-control"
          id="email"
          value="66REC1103"
          name="email"
        />
      </div>

      <div class="col-sm-3 col-md-1">
        <input type="text" class="form-control" id="email" name="q" v-model="queue" />
      </div>
      <div class="col-md-8">
        <table>
          <tr>
            <td @click="showModal">
              <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnqaInVc1iASODNTtkxaSp7Z_zoIDUDMNArKQwxCHUHw&s"
                alt=""
                style="height: 80px; width: 80px; margin-right: 20px"
              />
            </td>
            <td>
              <img
                @click="getOrderDataByDateAndQueue()"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLQDlDeKd8O4BrfOk6iuyzaaqXITgUJ69Zzw&usqp=CAU"
                alt=""
                style="height: 80px; width: 80px; margin-right: 20px"
              />
            </td>
            <td>
              <img
                src="https://cdn-icons-png.flaticon.com/512/4856/4856668.png"
                alt=""
                style="height: 80px; width: 80px; margin-right: 20px"
              />
            </td>
            <td>
              <img
                src="https://icons-for-free.com/iconfiles/png/512/print-131964753156480777.png"
                alt=""
                style="height: 80px; width: 80px; margin-right: 20px"
              />
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row" style="margin-top: -35px !important">
      <label class="control-label col-sm-2 col-md-1" for="email">วันที่:</label>
      <div class="col-sm-3 col-md-2">
        <input type="date" v-model="date" class="form-control" id="email" name="date" />
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Stock Receive</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div v-if="responseData" style="overflow-x: auto">
            <!-- <p>Response Data: {{ responseData }}</p> -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Q_No</th>
                  <th scope="col">dlmDate</th>
                  <th scope="col">Cust_Name</th>
                  <th scope="col">strVendorType</th>
                  <th scope="col">Finish</th>
                  <th scope="col">Pay_Status</th>
                  <th scope="col">strTRNNO</th>
                  <th scope="col">PaidBy</th>
                  <th scope="col">dtmUpdate</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in responseData.data">
                  <td>{{ selectedDate }}</td>
                  <td>อภิชาติ</td>
                  <td>{{ item.customer_class }}</td>
                  <td>{{ item.status }}</td>
                  <td>0</td>
                  <td>{{ item.queue }}</td>
                  <td></td>
                  <td>{{ item.queue }}</td>
                  <td>{{ item.createAt }}</td>
                  <td>
                    <button class="btn btn-success" @click="getOrder(item)">
                      <i class="fa fa-plus mr-2"></i>เลือก
                    </button>
                  </td>
                </tr>
              </tbody>
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
export default {
  data() {
    return {
      queue: 0,
      modalOpen: false,
      responseData: null,
      date: new Date().toISOString().slice(0, 10),
      selectedDate: new Date().toLocaleDateString("th-TH", {
        year: "numeric",
        month: "long",
        day: "numeric",
      }),
    };
  },

  methods: {
    async getOrderDataByDateAndQueue() {
      await axios
        .post(
          process.env.MIX_DEV_API + "/order/getorderbydateandqueue",
          {
            createAt: this.date,
            queue: this.queue,
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((res) => {
          console.log("--rrrrrแจ้งเตือน LINE--", res);
          //     var clickedItems = [];
          // clickedItems.push({ description: item.detail_name_th, qty: this.num, total: this.num * this.mul });
          //   localStorage.storedData = JSON.stringify(this.clickedItems);
          this.$store.dispatch("loadOrderId", res.data.data[0]._id);

          if (typeof res.data.data[0].order_detail == "undefined") {
            this.$store.dispatch("loadItems", []);
          } else {
            this.$store.dispatch("loadItems", res.data.data[0].order_detail);
          }
        })
        .catch((err) => {
          this.$store.dispatch("loadItems", []);
        });
    },
    getOrder(item) {
      console.log("item", item);
      var clickedItems = [];

      //sdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsd
      this.$store.dispatch("loadOrderId", item._id);
      $("#exampleModal").modal("hide");

      clickedItems.push({
        description: item.detail_name_th,
        qty: this.num,
        total: this.num * this.mul,
      });
      //   localStorage.storedData = JSON.stringify(this.clickedItems);
      this.$store.dispatch("loadItems", item.order_detail);
    },
    showModal() {
      const config = {
        method: "get",
        url: process.env.MIX_DEV_API + "/order/getfinishtoday",
        headers: {
          "ngrok-skip-browser-warning": "true",
          // Add any other headers as needed
        },
        // Other configuration options can be added here
      };

      // Make the request
      axios(config)
        .then((response) => {
          // Handle the response
          console.log("ddddddd", response);
          this.responseData = response.data;

          $("#exampleModal").modal("show");
        })
        .catch((error) => {
          // Handle errors
          console.error("Error:", error);
        });
    },
  },
  mounted: function () {
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
        // Handle the response
        this.queue = response.data.data;
      })
      .catch((error) => {
        // Handle errors
        console.error("Error:", error);
      });
  },

  computed: {
    propertyComputed() {
      console.log("I change when this.property changes.");

      return this.property;
    },
  },

  created() {
    this.property = "Example property update.";

    console.log("propertyComputed will update, as this.property is now reactive.");
  },
};
</script>
