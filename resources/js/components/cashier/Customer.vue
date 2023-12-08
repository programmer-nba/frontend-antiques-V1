<template>
  <modal
    :modal-id="'createCustomer'"
    title="เพิ่มลูกค้า"
    button-text="เพิ่มลูกค้า"
    class-name="btn btn-primary float-right"
    icon-name="fa fa-plus"
  >
  <div class="form-group">
      <label for="exampleInputEmail1">หมายเลขทะเบียนรถ </label>
      <input type="text" class="form-control" v-model="customer.vehicle" placeholder="ป้อนหมายเลขทะเบียนรถ" />
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">เลขบัตรประชาชน </label>
      <input type="text" class="form-control" v-model="customer.idcard" placeholder="ป้อนเลขบัตรประชาชน" />
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">ชื่อ </label>
      <input type="text" class="form-control" v-model="customer.name" placeholder="ป้อนชื่อ" />
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">ที่อยู่ </label>
      <input type="text" class="form-control" v-model="customer.address" placeholder="ป้อนที่อยู่" />
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">วันเกิด </label>
      <input type="text" class="form-control" v-model="customer.birthday" placeholder="ป้อนวันเกิด" />
    </div>
    <!-- <button
                              @click="() => saveCategory()"
                              type="button"
                              class="btn btn-primary float-right"
                            >
                              <i class="fa fa-save mr-2"></i>บันทึก
                            </button> -->
    <button type="button" @click="saveCustomer()" class="btn btn-success mr-2 float-right">
      <i class="fa fa-save mr-2"></i>บันทึกข้อมูล
    </button> </modal
  >&nbsp;

  <br /><br />
  <form>
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label>ID</label>
          <select2-component
            v-model="idCard"
            name="idcard[]"
            id="idcard"
            class="form-control"
          >
            <option value="">-- กรุณาเลือก --</option>
            <option v-for="data in dataId" :value="data.id_card" @click="test(data)">
              {{ data.id_card }}
            </option>
          </select2-component>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label>Name</label>

          <select2-component v-model="name" name="name[]" id="name" class="form-control">
            <option value="">-- กรุณาเลือก --</option>
            <option v-for="data in dataName" :value="data.fullname_th">
              {{ data.fullname_th }}
            </option>
          </select2-component>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label>Type</label>
          <input
            type="text"
            disabled
            class="form-control"
            placeholder="Enter ..."
            :value="type"
            style="color: red; font-size: 20px; font-weight: bold"
          />
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label>Warehoursse</label>
          <select2-component name="Warehoursse[]" id="Warehoursse" class="form-control">
            <option value="1">W01 - WH Inside</option>
          </select2-component>
        </div>
      </div>
      <!-- <div class="col-sm-3">
              <div class="form-group">
                <label>&nbsp;</label>
                <input type="text" class="form-control" placeholder="Enter ..." disabled />
              </div>
            </div> -->
      <div class="col-sm-5">
        <div class="form-group">
          <div v-for="(name, i) in key" :key="name.id">
            <div class="name">
              <span @click="greet()">{{ i }} {{ name.name }}</span>
            </div>
          </div>
          <label>Vehicle ID </label>

          <select2-component
            v-model="vehicle"
            name="vehicle[]"
            id="vehicle"
            class="form-control"
          >
            <option value="">-- กรุณาเลือก --</option>
            <option v-for="(data, key) in dataVehicle" :value="data.vehicle">
              {{ data.vehicle }}
            </option>
          </select2-component>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
          <button type="button" @click="clear" class="btn btn-danger mt-4">ล้าง</button>
        </div>
      </div>
    </div>
  </form>
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
          @click="getOrder()"
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLQDlDeKd8O4BrfOk6iuyzaaqXITgUJ69Zzw&usqp=CAU"
          alt=""
          style="height: 80px; width: 80px; margin-right: 20px"
        />
      </td>
      <td>
        <img
          @click="saveafterfinish()"
          src="https://cdn-icons-png.flaticon.com/512/4856/4856668.png"
          alt=""
          style="height: 80px; width: 80px; margin-right: 20px"
        />
      </td>
      <!-- <td>
        <a href="/user/print/queue">
          <img
            src="https://icons-for-free.com/iconfiles/png/512/print-131964753156480777.png"
            alt=""
            style="height: 80px; width: 80px; margin-right: 20px"
          /></a>
        </td> -->
    </tr>
  </table>
  <!-- Modal -->
<div class="modal fade"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Stock Receive</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div v-if="responseData" style="overflow-x:auto;">
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
    <td>{{selectedDate}}</td>
      <td>อภิชาติ</td>
      <td>{{item.customer_class}}</td>
      <td>{{item.status}}</td>
      <td>0</td>
      <td>{{item.queue}}</td>
      <td></td>
      <td>{{item.queue}}</td>
      <td>{{item.createAt}}</td>
      <td>
        <button class="btn btn-success" @click="getOrder(item)"><i class="fa fa-plus mr-2"></i>เลือก</button>
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
import Select2Component from "../Select2";

export default {
  components: {
    "select2-component": Select2Component,
  },
  data() {
    return {
        modalOpen: false,
        responseData: null,
      active: false,
      key: [],
      show: false,
      num: 0,
      items: [
        { text: "foo", value: "bar" },
        { text: "bar", value: "biz" },
        { text: "buzz", value: "buzz" },
      ],
      datas: [],
      totalTaxes: 0,
      dataId: [],
      dataName: [],
      dataVehicle: [],
      idCard: "",
      name: "",
      vehicle: "",
      type: "",
      loadCustomers: [],
      customer: {
        name: '',
        vehicle: '',
        idcard: '',
        address: '',
        birthday: ''
      }
    };
  },
  mounted: async function () {
    $('#createCustomer').on('show.bs.modal', function (e) {
    setInterval(() => {
        $.ajax({
        url: 'https://localhost:8182/thaiid/read.jsonp?callback=callback&section1=true&section2a=true&section2c=true',
        method: 'GET',
        type: 'JSON',
        success: function (jsondata) {

            var data = jsondata.substr(13, jsondata.length - 14);
            var jdata = JSON.parse(data);
            console.log(jdata)

            if (jdata !== null) {
                self.customer.idcard = jdata.CitizenNo
                self.customer.name = jdata.TitleNameTh+jdata.FirstNameTh + " " + jdata.LastNameTh
                self.customer.address = `บ้านเลขที่ ${jdata.HomeNo} หมู่ ${jdata.Moo} ตำบล${jdata.Tumbol} อำเภอ${jdata.Amphur} จังหวัด${jdata.Province}`

                const date = new Date(jdata.BirthDate
.substr(0,4) -543, jdata.BirthDate.substr(4,2)-1, String(jdata.BirthDate).substr(6,2))
                console.log(jdata.BirthDate
.substr(0,4), jdata.BirthDate
.substr(4,2), jdata.BirthDate
.substr(6,2))
const result = date.toLocaleDateString('th-TH', {
  year: 'numeric',
  month: 'long',
  day: 'numeric',
})

self.customer.birthday = result

            }else{
                self.customer.idcard = "";
                self.customer.name = "";
                self.customer.address = "";
            }
        }, error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus)
            // $.busyLoadFull("hide");
            // Swal.fire({
            //     type: 'warning',
            //     title: 'ไม่สำเร็จ',
            //     text: 'ยังไม่มีการอนุญาตการอ่านบัตร!' + textStatus
            // }).then((res) => {
            //     start_read();
            // });
        }
    })
    }, 1000);

})
    try {
      // Call the appropriate smart card reader API or library
      const cardData = await smartCardReader.read();

      // Process the card data
      console.log("Smart Card Data:", cardData);
    } catch (error) {
      console.error("Error reading smart card:", error);
    }

    this.loadId();
    this.loadName();
    this.loadVehicle();
    const self = this;
    $("#vehicle").on("change", async function () {
      await axios
        .post(
          process.env.MIX_DEV_API + "/customer/filterCusByData",
          {
            vehicle: $("#vehicle").val(),
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {
          console.log("aa", response);
          self.type = response.data.data[0].class;
          //   this.vehicle = response.data.data[0].vehicle;
          //   this.name = response.data.data[0]._id;
          if (response.data.data[0].fullname_th == self.name) {
          } else {
            self.name = response.data.data[0].fullname_th;
            self.loadCustomers = response.data.data[0];

            $("#name").val(response.data.data[0].fullname_th).trigger("change");
            $("#idcard").val(response.data.data[0].id_card).trigger("change");
          }
        });
    });
    $("#idcard").on("change", async function () {
      await axios
        .post(
          process.env.MIX_DEV_API + "/customer/filterCusByData",
          {
            id_card: $("#idcard").val(),
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then(async (response) => {
          console.log("aa", response);
          self.type = response.data.data[0].class;
          //   this.vehicle = response.data.data[0].vehicle;
          //   this.name = response.data.data[0]._id;
          if (response.data.data[0].fullname_th == self.name) {
          } else {
            self.name = response.data.data[0].fullname_th;
            self.loadCustomers = response.data.data[0];

            $("#name").val(response.data.data[0].fullname_th).trigger("change");
            $("#vehicle").val(response.data.data[0].vehicle).trigger("change");

            //spiderman
          }
        });
    });
    $("#name").on("change", async function () {
      await axios
        .post(
          process.env.MIX_DEV_API + "/customer/filterCusByData",
          {
            fullname_th: $("#name").val(),
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {
          console.log("aa", response);
          self.type = response.data.data[0].class;
          //   this.vehicle = response.data.data[0].vehicle;
          //   this.idCard = response.data.data[0].id_card;
          if (response.data.data[0].fullname_th == self.name) {
          } else {
            self.loadCustomers = response.data.data[0];

            self.name = response.data.data[0].fullname_th;
            self.name = response.data.data[0].fullname_th;
            $("#vehicle").val(response.data.data[0].vehicle).trigger("change");
            $("#idcard").val(response.data.data[0].id_card).trigger("change");
          }
        });
    });

    // await axios.post(process.env.DEV_API,{
    //         message : message
    //     } ,{
    //         headers: {
    //             'Content-Type' : 'application/x-www-form-urlencoded',
    //             'Authorization' : `Bearer ${process.env.LINE_TOKEN}`
    //         }
    //     }).then((res)=>{
    //         console.log('--แจ้งเตือน LINE--')
    //     }).catch((err)=>{
    //         console.log(err);
    //         console.log('--แจ้งเตือนไลน์ไม่สำเร็จ--')
    //     })

    // alert(process.env.MIX_DEV_API)

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
  watch: {
    key: function (val, oldVal) {
      console.log(val);
      console.log(oldVal);
    },
    idCard: async function (val, oldVal) {
      const self = this;
      this.$store.dispatch("loadCustomers", this.loadCustomers);
      console.log(this.$store.state.customers);
      console.log("jj", this.loadCustomers);
      var items = this.$store.state.items;

      this.$store.dispatch("loadItems", []);

      await items.forEach(async function (element) {
        console.log("aam", element);

        var clickedItems = [];
        await axios
          .post(
            process.env.MIX_DEV_API + "/getdetailvendor",
            {
              detail_id: element.detail_id,
              class: self.type,
            },
            {
              headers: {
                "ngrok-skip-browser-warning": "true",
              },
            }
          )
          .then((response) => {
            self.mul = response.data.data;

            // clickedItems.push({
            //   description: element.description,
            //   qty: element.qty,
            //   total: element.qty * self.mul,
            //   detail_id: element.detail_id,
            // });
            // console.log("it", clickedItems)
            self.$store.dispatch(
              "loadItems",
              self.$store.state.items.concat([
                {
                  description: element.description,
                  qty: element.qty,
                  total: element.qty * self.mul,
                  detail_id: element.detail_id,
                },
              ])
            );
          });
      });
    },
    name: async function (val, oldVal) {
      //   this.$store.dispatch("loadCustomers", this.loadCustomers);
      //   console.log(this.$store.state.customers);
    },
    vehicle: function (val, oldVal) {
      //   this.$store.dispatch("loadCustomers", this.loadCustomers);
      //   console.log(this.$store.state.customers);
    },
    loadCustomers: function (val, oldVal) {},
  },
  methods: {
    async saveCustomer(){
        console.log("customer",this.customer)
        await axios
        .post(
          process.env.MIX_DEV_API + "/customer/createCus",
          {
            id_card: this.customer.idcard,
            fullname_th: this.customer.name,
            vehicle: this.customer.vehicle,
            birthday: this.customer.birthday,
            address: this.customer.address
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {

            this.$swal({
            title: "บันทึกรายการข้อมูลสำเร็จ!",
            icon: "success",
          }).then(function () {
            window.location.reload();
          });

          setTimeout(() => {
            window.location.reload();
          }, 5000);
        });
    },
    showModal() {
        const config = {
        method: 'get',
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
          console.log("ddddddd", response)
          this.responseData = response.data;

          $('#exampleModal').modal('show')
;
        })
        .catch((error) => {
          // Handle errors
          console.error('Error:', error);
        });
      },
    clear() {
      alert("clear");
    },
    async saveafterfinish() {
      await axios
        .post(
          process.env.MIX_DEV_API + "/order/saveafterfinish",
          {
            customers: this.$store.state.customers,
            items: this.$store.state.items,
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {
          this.$swal({
            title: "บันทึกรายการข้อมูลสำเร็จ!",
            icon: "success",
          }).then(function () {
            window.location.reload();
          });

          setTimeout(() => {
            window.location.reload();
          }, 5000);
        });
    },
    reloadPage() {
      window.location.reload();
    },
    myChangeEvent(val) {
      alert(val);
      console.log(val);
    },
    mySelectEvent({ id, text }) {
      alert({ id, text });
      console.log({ id, text });
    },
    async loadId() {
      await axios
        .get(process.env.MIX_DEV_API + "/customer/dropdownCus_id", {
          headers: {
            "ngrok-skip-browser-warning": "true",
          },
        })
        .then((res) => {
          console.log("res", res);
          this.dataId = res.data.data;

          //         this.clickedItems.push({ description: item.detail_name_th, qty: this.num, total: this.num * this.mul });
          //   localStorage.storedData = JSON.stringify(this.clickedItems);
          //   this.$store.dispatch("loadItems", this.clickedItems);
        })
        .catch((err) => {});
    },
    async loadName() {
      await axios
        .get(process.env.MIX_DEV_API + "/customer/dropdownCus_name", {
          headers: {
            "ngrok-skip-browser-warning": "true",
          },
        })
        .then((res) => {
          this.dataName = res.data.data;
        })
        .catch((err) => {});
    },
    async loadVehicle() {
      await axios
        .get(process.env.MIX_DEV_API + "/customer/dropdownCus_vehicle", {
          headers: {
            "ngrok-skip-browser-warning": "true",
          },
        })
        .then((res) => {
          this.dataVehicle = res.data.data;
        })
        .catch((err) => {});
    },

    greet: function (event) {
      // `this` inside methods points to the Vue instance
      console.log("Hello " + this.key + "!");
      console.log(this.key);

      // `event` is the native DOM event
      //   if (event) {
      //     alert(event.target.tagName)
      //   }
    },
    onChange(event) {
      console.log(event);
    },
    onSelect(item) {
      this.show = false;
      this.active = false;
      this.clickedItems.push({ text: "buzz", value: "buzz" });
      localStorage.storedData = JSON.stringify(this.clickedItems);
      console.log(this.clickedItems);
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
      alert("dd");
      // let api_url = process.env.MIX_API_KEY;
      // alert(api_url)
    },
    async getOrder() {
      console.log("test", this.$store.state.queueDate);
      await axios
        .post(
          process.env.MIX_DEV_API + "/order/getorderbydateandqueue",
          {
            createAt: this.$store.state.queueDate[1],
            queue: this.$store.state.queueDate[0],
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((res) => {
          console.log("--แจ้งเตือน LINE--", res);
          //     var clickedItems = [];
          // clickedItems.push({ description: item.detail_name_th, qty: this.num, total: this.num * this.mul });
          //   localStorage.storedData = JSON.stringify(this.clickedItems);
          this.$store.dispatch("loadOrderId", res.data.data[0]._id);

          this.$store.dispatch("loadOpen", [res.data.data[0].status]);

          if (typeof res.data.data[0].order_detail == "undefined") {
            this.$store.dispatch("loadItems", []);
          } else {
            this.$store.dispatch("loadItems", res.data.data[0].order_detail);
          }
        })
        .catch((err) => {
          this.$store.dispatch("loadItems", []);
        });
      // console.log("item", item)
      //     var clickedItems = [];

      //     //sdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsd
      //     this.$store.dispatch("loadOrderId", item._id);
      //     $('#exampleModal').modal('hide')

      //     clickedItems.push({ description: item.detail_name_th, qty: this.num, total: this.num * this.mul });
      // //   localStorage.storedData = JSON.stringify(this.clickedItems);
      //   this.$store.dispatch("loadItems", item.order_detail);
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
