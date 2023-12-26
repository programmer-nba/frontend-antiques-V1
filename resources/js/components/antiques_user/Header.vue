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

                          <input type="text" readonly class="form-control" id="staticEmail" :value="this.$store.state.dataOpen[1]">
                        </div>
                      </div>
                </li>
                <li class="nav-item mr-2">
                    <div class="form-group row" style="margin-bottom:0;">
                        <label for="staticEmail" class="col-sm-2" style="  margin: auto;
                        width: 50%;
                      ">Status: </label>
                        <div class="col-sm-10">
                          <input style="color: blue;
    font-weight: bold;" type="text" readonly class="form-control" id="staticEmail" :value="this.$store.state.dataOpen[0]">
                        </div>
                      </div>
                </li>
                <li class="nav-item mr-2">
                    <div class="form-group row" style="margin-bottom:0;">
                        <label for="staticEmail" class="col-sm-2" style="  margin: auto;
                        width: 50%;
                      ">Date: </label>
                        <div class="col-sm-10">
                          <input type="date"  class="form-control" id="staticEmail"  v-model="this.$store.state.queueDate[1]">
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
                          <input type="number" v-model="this.$store.state.queueDate[0]" class="form-control" id="staticEmail"  style="font-size: 36px;
                          color: red;
                          padding-left: 0px;
                          font-weight: bold;
                          padding: 2px;height:39px;text-align: center;">
                        </div>
                        <button type="button" class="btn btn-warning" @click="printQueue()"><i class="fa fa-print mr-2"></i>PRINT QUEUE</button>

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
    async printQueue(){
        const printFrame = document.createElement('iframe');
      printFrame.style.visibility = 'hidden';
      document.body.appendChild(printFrame);

      const printDocument = printFrame.contentDocument || printFrame.contentWindow.document;

      const today = new Date();

      const date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                    const time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                    const dateTime = date +' '+ time;
                    var queue = this.$store.state.queueDate[0];

      // Replace the following line with the content you want to print
      printDocument.write(`
        <html>
          <head>
            <title>ใบคิว</title>
          </head>
          <body>
            <h3 style="text-align:center">วงษ์พาณิชย์ สุขุมวิท 101/1</h3>
            <p style="text-align:center">${dateTime}</p>
            <h1 style="text-align:center;font-size:50px;">${queue}</h1>
            <p style="text-align:center">กรุณารอเรียกรับเงิน</p>
          </body>
        </html>
      `);

      printFrame.contentWindow.print();

      // Remove the iframe after printing
      setTimeout(() => {
        document.body.removeChild(printFrame);
      }, 1000); // Adjust the timeout as needed

    },
    async getOrderDataByDateAndQueue(){
      await axios.post(process.env.MIX_DEV_API + "/order/getorderbydateandqueue",{
            createAt : this.date,
            queue: this.queue
        } ,{
            headers: {
                "ngrok-skip-browser-warning": "true",
}
        }).then((res)=>{
            console.log('--แจ้งเตือนgg LINE--', res)
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
      }
    },
    mounted:function(){



        const config = {
        method: 'get',
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
        // alert(this.$store.state.queueDate[1])
        // alert(this.date)

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






