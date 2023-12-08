<template>
  <div class="card card-success">
    <div class="card-header">
      <h3 class="card-title" style="margin-bottom:0px;">Customer/ลูกค้า</h3>
    </div>

    <div class="card-body">
      <button class="btn btn-primary float-right">
        <i class="fa fa-plus mr-2"></i>เพิ่มลูกค้า
      </button>

      <br /><br />
      <form>
        <div class="row">
          <div class="col-sm-4">
            <div class="form-group">
              <label>ID {{idCard}}</label>
              <select id="mySelect2" ref="mySelect2"                 v-model="idCard"
 style="width:10rem">
                <option v-for="data in dataId" :value="data.id_card" :selected="idCard == data.id_card">
                  {{ data.id_card }}
                </option>
              </select>


            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label>Name</label>

              <!-- <select2-component
                v-model="name"
                name="name[]"
                id="name"
                class="form-control"
              >
                <option value="">-- กรุณาเลือก --</option>
                <option v-for="data in dataName" :value="data._id">
                  {{ data.fullname_th }}
                </option>
              </select2-component> -->
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
          <div class="col-sm-3">
            <div class="form-group">
              <label>Warehoursse</label>
              <!-- <select2-component
                name="Warehoursse[]"
                id="Warehoursse"
                class="form-control"
              >
                <option value="">-- กรุณาเลือก --</option>

                <option value="1">โกดังน๊อต</option>
                <option value="1">โกดัง ฺB</option>
                <option value="1">โกดัง C</option>
                <option value="1">โกดัง A</option>
                <option value="1">โกดัง Y</option>
                <option value="1">ห้องเชือดบอล</option>
                <option value="1">ห้องขึ้นเขียง</option>
              </select2-component> -->
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div v-for="(name, i) in key" :key="name.id">
                <div class="name">
                  <span @click="greet()">{{ i }} {{ name.name }}</span>
                </div>
              </div>
              <label>Vehicle ID {{ vehicle }}</label>
              <select id="mySelect" ref="mySelect" v-model="vehicle" style="width:10rem">
                <!-- <option
                  v-for="(data, key) in dataVehicle"
                  :value="'option'+key"
                >
                  {{ data.vehicle }}
                </option> -->
                <option value="option1" :selected="vehicle == 'option1'">ddd</option>
                <option value="option2" :selected="vehicle == 'option2'">aaa</option>
                <option value="option3">bbb</option>

              </select>

<!--
              <select2-component
                v-model="vehicle"
                name="vehicle[]"
                id="vehicle"
                class="form-control"
              >
                <option value="">-- กรุณาเลือก --</option>
                <option
                  v-for="(data, key) in dataVehicle"
                  :value="'option'+key"
                  :selected="vehicle == data.vehicle"
                >
                  {{ data.vehicle }}
                </option>
              </select2-component> -->
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <button class="btn btn-danger mt-4">ล้าง</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import $ from 'jquery';
import 'select2';

export default {

  data() {
    return {
        selectedValue: null,
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
    };
  },
  mounted: function () {
    $(this.$refs.mySelect).select2();
    $(this.$refs.mySelect2).select2();

// Handle changes in Select2 value
$(this.$refs.mySelect).on('change', this.handleSelectChange);
$(this.$refs.mySelect2).on('change', this.handleSelectChange2);


    this.loadId();
    this.loadName();
    this.loadVehicle();
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
    selectedValue(newValue) {
      $(this.$refs.mySelect).val(newValue).trigger('change');
      $(this.$refs.mySelect2).val("option2").trigger('change');

    },

    key: function (val, oldVal) {
      console.log(val);
      console.log(oldVal);
    },
    idCard: async function (val, oldVal) {
      console.log(val[0]);
      await axios
        .post(
          process.env.MIX_DEV_API + "/customer/filterCusByData",
          {
            id_card: val[0].name,
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {
          console.log("aa", response);
          alert("123")
          this.type = response.data.data[0].class;
          this.vehicle = "option2"

        //   $("#mySelect").select2().select2('val','option2');

          alert(this.vehicle)
          this.$store.dispatch("loadCustomers", response.data.data[0]);
          console.log(this.$store.state.customers);
        });
    },
    name: function (val, oldVal) {
      // alert(val)
    },
    vehicle: function (val, oldVal) {
      // alert(val)
    },
  },
  methods: {
    handleSelectChange() {
      // Access the selected value
    //   alert("99")
      this.vehicle ="option2"
    //   $(this.$refs.mySelect).val("option2").trigger('change');


    },
    handleSelectChange2() {
        alert($(this.$refs.mySelect2).val())
        alert("gg")
      // Access the selected value
      this.idCard = $(this.$refs.mySelect2).val();
      $(this.$refs.mySelect).val("option2").trigger('change');

      console.log('Selected Value:', this.selectedValue2);
    },
    myChangeEvent(val){
        alert(val)
            console.log(val);
        },
        mySelectEvent({id, text}){
            alert({id, text})
            console.log({id, text})
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
      console.log(event.target.value);
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
