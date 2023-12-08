<template>
     <div  style="overflow-x:auto;height: 36vh;
    overflow-y: auto;">
        <table class="table table-bordered" style="    ">
                                    <thead style="background-color:blueviolet;color:white;">
                                        <tr>
                                            <th>ProductID</th>
                                            <th>Description</th>
                                            <th>Qty</th>
                                            <th>DeductQty</th>
                                            <th>Net Qty</th>
                                            <th>UM</th>
                                            <th>Cost</th>
                                            <th>Amount</th>
                                            <th>DeductAmt</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr v-for="(value, i) in datas" :key="i">
                                            <td>{{i+1}}</td>
                                            <td>{{value.description}}</td>
                                            <td>{{value.qty}}</td>
                                            <td></td>
                                            <td></td>
                                            <td>กิโล</td>
                                            <td></td>
                                            <td></td>
                                            <td>0</td>
                                            <td>{{value.total}}</td>

                                        </tr>

                                    </tbody>
                                </table>
     </div>
                                <!-- {{ count }}
                                dddd -->
                                <br>
<div class="row">
    <div class="col-md-4">

        </div>
        <div class="col-md-4">

</div>
<div class="col-md-4">
    <div class="form-group row" style="margin-bottom: 0px;    margin-bottom: 0px;
    position: absolute;
    ">
    <label for="staticEmail" class="col-sm-12" style="margin: auto; width: 50%;">Weight: 25.48 KG Total: 25,642 </label>

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
