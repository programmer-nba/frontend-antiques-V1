<template>

<ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#"></a>
                </li>

                <li class="nav-item mr-2">
                    <div class="form-group row" style="margin-bottom:0;">
                        <label for="staticEmail" class="col-sm-2" style="  margin: auto;
                        width: 50%;
                      ">Type: </label>
                        <div class="col-sm-10">

                          <input type="text" readonly class="form-control" id="staticEmail" value="66REC1122">
                        </div>
                      </div>
                </li>
                <li class="nav-item mr-2">
                    <div class="form-group row" style="margin-bottom:0;">
                        <label for="staticEmail" class="col-sm-2" style="  margin: auto;
                        width: 50%;
                      ">Status: </label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" id="staticEmail" :value="this.$store.state.dataOpen[0]">
                        </div>
                      </div>
                </li>
                <li class="nav-item mr-2">
                    <div class="form-group row" style="margin-bottom:0;">
                        <label for="staticEmail" class="col-sm-2" style="  margin: auto;
                        width: 50%;
                      ">Date: </label>
                        <div class="col-sm-10">
                          <input type="date"  class="form-control" id="staticEmail"  v-model="date">
                        </div>
                      </div>
                </li>
                <li class="nav-item mr-2">
                    <div class="form-group row" style="margin-bottom:0;">
                        <label for="staticEmail" class="col-sm-2" style="margin: auto;
                        width: 50%;
                        margin-left:0px;
                        margin-right:0px;
                        margin-right: -29px;
                      ">Queue: </label>
                        <div class="col-sm-4">
                          <input type="number" v-model="queue" class="form-control" id="staticEmail"  style="font-size: 36px;
                          color: red;
                          padding-left: 0px;
                          font-weight: bold;
                          padding: 2px;height:39px;text-align: center;">
                        </div>
                      </div>
                </li>

              </ul>

</template>
<script>
export default {

  data() {

    return {
        queue: 0,
        modalOpen: false,
        responseData: null,
        date:new Date().toISOString().slice(0, 10),
        selectedDate: new Date().toLocaleDateString('th-TH', {
  year: 'numeric',
  month: 'long',
  day: 'numeric',
})

    }

  },

  methods: {
    async getOrderDataByDateAndQueue(){
      await axios.post(process.env.MIX_DEV_API + "/v1/antiques/order/getorderbydateandqueue",{
            createAt : this.date,
            queue: this.queue
        } ,{
            headers: {
                "ngrok-skip-browser-warning": "true",
}
        }).then((res)=>{
            console.log('--แจ้งเตือน LINE--', res)
        //     var clickedItems = [];
        // clickedItems.push({ description: item.detail_name_th, qty: this.num, total: this.num * this.mul });
    //   localStorage.storedData = JSON.stringify(this.clickedItems);
    this.$store.dispatch("loadOrderId", res.data.data[0]._id);



            if(typeof res.data.data[0].order_detail == "undefined"){
                this.$store.dispatch("loadItems", []);

            }else{
                this.$store.dispatch("loadItems", res.data.data[0].order_detail);

            }


        }).catch((err)=>{
            this.$store.dispatch("loadItems", []);
        })
    },
    getOrder(item){
        console.log("item", item)
        var clickedItems = [];

        //sdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsdfsd
        this.$store.dispatch("loadOrderId", item._id);
        $('#exampleModal').modal('hide')

        clickedItems.push({ description: item.detail_name_th, qty: this.num, total: this.num * this.mul });
    //   localStorage.storedData = JSON.stringify(this.clickedItems);
      this.$store.dispatch("loadItems", item.order_detail);
    },
      showModal() {
        const config = {
        method: 'get',
        url: process.env.MIX_DEV_API + "/v1/antiques/order/getfinishtoday",
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
      }
    },
    mounted:function(){



        const config = {
        method: 'get',
        url: process.env.MIX_DEV_API + "/v1/antiques/order/getlastqueue",
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

          this.$store.dispatch("loadQueueAndDate", [
            this.queue,
            this.date
          ]);

          console.log("test", this.$store.state.queueDate)

        })
        .catch((error) => {
          // Handle errors
          console.error('Error:', error);
        });
    },

  computed: {

    propertyComputed() {

      console.log('I change when this.property changes.')

      return this.property

    }

  },



  created() {

    this.property = 'Example property update.'

    console.log('propertyComputed will update, as this.property is now reactive.')

  },
  watch:{
    date:function(){
        this.$store.dispatch("loadQueueAndDate", [
            this.queue,
            this.date
          ]);


    },
    queue:function(){
        this.$store.dispatch("loadQueueAndDate", [
            this.queue,
            this.date
          ]);



    }
  }

}

</script>






