<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">หมวดหมู่สินค้า</h3>
          </div>
          <form>
            <div class="card-body">
              <modal
                :modal-id="'addCategory'"
                title="เพิ่มหมวดหมู่สินค้า"
                button-text="เพิ่มหมวดหมู่สินค้า"
                class-name="btn btn-success float-right"
                icon-name="fa fa-plus"
              >
                <div class="form-group">
                  <label for="exampleInputEmail1">ชื่อหมวดหมู่ไทย </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="category_name_th"
                    placeholder="ป้อนชื่อหมวดหมู่ไทย"
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">ชื่อหมวดหมู่อังกฤษ </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="category_name_en"
                    placeholder="ป้อนชื่อหมวดหมู่อังกฤษ"
                  />
                </div>
                <button
                  @click="() => saveCategory()"
                  type="button"
                  class="btn btn-primary float-right"
                >
                  <i class="fa fa-save mr-2"></i>บันทึก
                </button> </modal
              ><br /><br />
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ชื่อหมวดหมู่ไทย</th>
                    <th>ชื่อหมวดหมู่อังกฤษ</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(item, index) in item_categorys"
                    @click="chooseCategory(item)"
                  >
                    <td>{{ item.category_name_th }}</td>
                    <td>{{ item.category_name_en }}</td>
                    <td>
                      <modal
                        :modal-id="'updateCategory' + index"
                        title="แก้ไขหมวดหมู่สินค้า"
                        button-text=""
                        class-name="btn btn-warning"
                        icon-name="fa fa-edit"
                      >
                        <div class="form-group">
                          <label for="exampleInputEmail1">ชื่อหมวดหมู่ไทย </label>
                          <input
                            type="text"
                            class="form-control"
                            v-model="item_categorys[index].category_name_th"
                            placeholder="ป้อนชื่อหมวดหมู่ไทย"
                          />
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">ชื่อหมวดหมู่อังกฤษ </label>
                          <input
                            type="text"
                            class="form-control"
                            v-model="item_categorys[index].category_name_en"
                            placeholder="ป้อนชื่อหมวดหมู่อังกฤษ"
                          />
                        </div>
                        <!-- <button
                              @click="() => saveCategory()"
                              type="button"
                              class="btn btn-primary float-right"
                            >
                              <i class="fa fa-save mr-2"></i>บันทึก
                            </button> -->
                        <button
                          type="button"
                          @click="() => updateCategory(index, item._id)"
                          class="btn btn-success mr-2 float-right"
                        >
                          <i class="fa fa-save mr-2"></i>อัพเดทข้อมูล
                        </button> </modal
                      >&nbsp;
                      <button
                        type="button"
                        class="btn btn-danger"
                        @click="() => deleteCategory(item._id)"
                      >
                        <i class="fa fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">ประเภทสินค้า</h3>
          </div>

          <div class="card-body">
            <modal
              :modal-id="'addType'"
              title="เพิ่มประเภทสินค้า"
              button-text="เพิ่มประเภทสินค้า"
              class-name="btn btn-success float-right"
              icon-name="fa fa-plus"
            >
              <div class="form-group">
                <label for="exampleInputEmail1">ชื่อประเภทสินค้าไทย </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="type_name_th"
                  placeholder="ป้อนชื่อประเภทสินค้าไทย"
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">ชื่อประเภทสินค้าอังกฤษ </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="type_name_en"
                  placeholder="ป้อนชื่อประเภทสินค้าอังกฤษ"
                />
              </div>
              <button
                @click="() => saveType()"
                type="button"
                class="btn btn-primary float-right"
              >
                <i class="fa fa-save mr-2"></i>บันทึก
              </button> </modal
            ><br /><br />
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ชื่อประเภทสินค้าภาษาไทย</th>
                  <th>ชื่อประเภทสินค้าอังกฤษ</th>
                  <th style="width: 10rem"></th>
                </tr>
              </thead>
              <tbody>

                <tr v-for="(item, index) in item_types" @click="chooseType(item)">
                  <td>{{ item.detail_th }}</td>
                  <td>{{ item.detail_en }}</td>
                  <td>
                    <modal
                      :modal-id="'updateType' + index"
                      title="แก้ไขประเภทสินค้า"
                      button-text=""
                      class-name="btn btn-warning"
                      icon-name="fa fa-edit"
                    >
                      <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อประเภทสินค้าไทย </label>
                        <input
                          type="text"
                          class="form-control"
                          v-model="item_types[index].detail_th"
                          placeholder="ป้อนชื่อประเภทสินค้าไทย"
                        />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อประเภทสินค้าอังกฤษ </label>
                        <input
                          type="text"
                          class="form-control"
                          v-model="item_types[index].detail_en"
                          placeholder="ป้อนชื่อประเภทสินค้าอังกฤษ"
                        />
                      </div>
                      <!-- <button
                              @click="() => saveCategory()"
                              type="button"
                              class="btn btn-primary float-right"
                            >
                              <i class="fa fa-save mr-2"></i>บันทึก
                            </button> -->
                      <button
                        type="button"
                        @click="() => updateType(index, item._id)"
                        class="btn btn-success mr-2 float-right"
                      >
                        <i class="fa fa-save mr-2"></i>อัพเดทข้อมูล
                      </button> </modal
                    >&nbsp;
                    <button class="btn btn-danger" @click="() => deleteType(item._id)">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">รายละเอียดสินค้า</h3>
          </div>
          <div class="card-body">
            <modal
              :modal-id="'addDetail'"
              title="เพิ่มรายละเอียดสินค้า"
              button-text="เพิ่มรายละเอียดสินค้า"
              class-name="btn btn-success float-right"
              icon-name="fa fa-plus"
            >
              <div class="form-group">
                <label for="exampleInputEmail1">ชื่อรายละเอียดสินค้าไทย </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="detail_name_th"
                  placeholder="ป้อนชื่อรายละเอียดสินค้าไทย"
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">ชื่อรายละเอียดสินค้าอังกฤษ </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="detail_name_en"
                  placeholder="ป้อนชื่อรายละเอียดสินค้าอังกฤษ"
                />
              </div>
              <button
                @click="() => saveDetail()"
                type="button"
                class="btn btn-primary float-right"
              >
                <i class="fa fa-save mr-2"></i>บันทึก
              </button> </modal
            ><br /><br />

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ชื่อรายละเอียดสินค้าภาษาไทย</th>
                  <th>ชื่อรายละเอียดสินค้าอังกฤษ</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(item, index) in item_detail_products"
                  @click="chooseDetailProducts(item)"
                >
                  <td>{{ item.detail_name_th }}</td>
                  <td>{{ item.detail_name_en }}</td>
                  <td>
                    <modal
                      :modal-id="'updateDetail' + index"
                      title="แก้ไขรายละเอียดสินค้า"
                      button-text=""
                      class-name="btn btn-warning"
                      icon-name="fa fa-edit"
                    >
                      <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อรายละเอียดสินค้าไทย </label>
                        <input
                          type="text"
                          class="form-control"
                          v-model="item_detail_products[index].detail_name_th"
                          placeholder="ป้อนชื่อรายละเอียดสินค้าไทย"
                        />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อรายละเอียดสินค้าอังกฤษ </label>
                        <input
                          type="text"
                          class="form-control"
                          v-model="item_detail_products[index].detail_name_en"
                          placeholder="ป้อนชื่อรายละเอียดสินค้าอังกฤษ"
                        />
                      </div>
                      <!-- <button
                              @click="() => saveCategory()"
                              type="button"
                              class="btn btn-primary float-right"
                            >
                              <i class="fa fa-save mr-2"></i>บันทึก
                            </button> -->
                      <button
                        type="button"
                        @click="() => updateDetail(index, item._id)"
                        class="btn btn-success mr-2 float-right"
                      >
                        <i class="fa fa-save mr-2"></i>อัพเดทข้อมูล
                      </button> </modal
                    >&nbsp;
                    <button class="btn btn-danger" @click="() => deleteDetail(item._id)">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">ราคาตามประเภทผู้ขาย</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">Vendor Type</th>
                  <th>Cost</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item, index) in item_vendor">
                  <td>
                    {{ index }}
                  </td>
                  <td>{{ item[0] }}</td>
                  <td>
                    <modal
                      :modal-id="'updateVendor' + index"
                      title="แก้ไขประเภทสินค้า"
                      button-text=""
                      class-name="btn btn-warning"
                      icon-name="fa fa-edit"
                    >
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 10px">Vendor Type</th>
                            <th>Cost</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                               <td> {{ index }}</td>
                               <td>
                                <input type="" name="" v-model="vendor_type[0][index][0]"  class="form-control">
                               </td>
                            </tr>

                        </tbody>
                      </table>

                      <button
                        type="button"
                        @click="() => updateVendor(index, item._id)"
                        class="btn btn-success mr-2 float-right"
                      >
                        <i class="fa fa-save mr-2"></i>อัพเดทข้อมูล
                      </button> </modal
                    >&nbsp;
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  async created() {},

  async mounted() {
    await axios
      .get(process.env.MIX_DEV_API + "/v1/antiques/get", {
        headers: {
          "ngrok-skip-browser-warning": "true",
        },
      })
      .then((res) => {
        console.log("res", res.data.data);
        this.item_categorys = res.data.data;
      });
  },

  data: () => ({
    category_name_th: "",
    category_name_en: "",
    choose_category_id: "",
    choose_type_id: "",
    choose_detail_id: "",
    type_name_th: "",
    type_name_en: "",
    detail_name_th: "",
    detail_name_en: "",
    vendor_id: "",
    vendor_type: [
        {
            A: 0,
            B: 0,
            C: 0,
            D: 0
        }
    ],
    item_categorys: [],
    item_types: [
      //   {
      //     category_name_th: "เทส",
      //     category_name_en: "aaa",
      //   },
    ],
    item_detail_products: [
      //   {
      //     category_name_th: "เทส",
      //     category_name_en: "aaa",
      //   },
    ],
    item_vendor: [
      //   {
      //     category_name_th: "เทส",
      //     category_name_en: "aaa",
      //   },
    ],
  }),

  methods: {
    async chooseCategory(event) {
      console.log("item", event);

      const self = this;

      self.item_vendor = [];
      self.item_detail_products = [];

      this.choose_category_id = event.category_id;

      await axios
        .post(
          process.env.MIX_DEV_API + "/v1/antiques/getcatebyid",
          {
            category_id: event.category_id,
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((res) => {
          console.log(res);
          this.item_types = res.data.data[0].all_cate;
        });

      //       await axios
      // .post(
      //   process.env.MIX_DEV_API + "/v1/antiques/CreateCategory",
      //   {
      //     category_name_th: this.item_categorys[0].category_name_th,
      //     category_name_en: this.item_categorys[0].category_name_en
      //   },
      //   {
      //     headers: {
      //       "ngrok-skip-browser-warning": "true",
      //     },
      //   }
      // )
      // .then((response) => {
      //     this.$swal('บันทึกข้อมูลสำเร็จ');
      //     window.location.reload();
      // })
    },

    async chooseType(event) {
      console.log("ttt", event);

      const self = this;

      self.item_vendor = [];

      //   axios({
      //     method: "get",
      //     url: "https://dummyjson.com/products",
      //   }).then(function (response) {
      //     console.log("response.data.products", response.data.products);
      //     self.item_detail_products = [
      //       {
      //         category_name_th: "7777",
      //         category_name_en: "22222",
      //       },
      //     ];
      //   });

      this.choose_type_id = event.type_id;

      await axios
        .post(
          process.env.MIX_DEV_API + "/v1/antiques/getdetailbyid",
          {
            type_id: event.type_id,
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((res) => {
          console.log(res);
          this.item_detail_products = res.data.data[0].all_cate;
        });
    },

    async saveCategory() {
      await axios
        .post(
          process.env.MIX_DEV_API + "/v1/antiques/CreateCategory",
          {
            category_name_th: this.category_name_th,
            category_name_en: this.category_name_en,
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {
          this.$swal("บันทึกข้อมูลสำเร็จ");
          setTimeout(function () {
            window.location.reload();
          }, 1000);
        });
    },

    async saveType() {
      console.log({
        category_id: this.choose_category_id,
        detail_th: this.type_name_th,
        detail_en: this.type_name_en,
      });
      await axios
        .post(
          process.env.MIX_DEV_API + "/v1/antiques/createtype",
          {
            category_id: this.choose_category_id,
            detail_th: this.type_name_th,
            detail_en: this.type_name_en,
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {
          this.$swal("บันทึกข้อมูลสำเร็จ").then(function () {
            window.location.reload();
          });
        });
    },

    async saveDetail() {
      console.log({
        category_id: this.choose_category_id,
        type_id: this.choose_type_id,
        detail_name_th: this.detail_name_th,
        detail_name_en: this.detail_name_th,
        price_A: 0,
        price_B: 0,
        price_C: 0,
        price_D: 0,
      });
      await axios
        .post(
          process.env.MIX_DEV_API + "/v1/antiques/createdetailproduct",
          {
            category_id: this.choose_category_id,
            type_id: this.choose_type_id,
            detail_name_th: this.detail_name_th,
            detail_name_en: this.detail_name_th,
            price_A: 0,
            price_B: 0,
            price_C: 0,
            price_D: 0,
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {
          this.$swal("บันทึกข้อมูลสำเร็จ").then(function () {
            // window.location.reload();
          });
        });
    },

    async updateCategory(index, id) {
      await axios
        .put(
          process.env.MIX_DEV_API + "/v1/antiques/update",
          {
            _id: id,
            category_name_th: this.item_categorys[index].category_name_th,
            category_name_en: this.item_categorys[index].category_name_en,
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {
          this.$swal({
            title: "อัพเดทข้อมูลสำเร็จ!",
            icon: "success",
          }).then(function () {
            window.location.reload();
          });
        });
    },

    async updateVendor(index, id) {

        await axios
        .put(
          process.env.MIX_DEV_API + "/v1/antiques/updatevendor",
          {
            vendor_id: this.vendor_id,
            vendor_data: JSON.stringify(
                {
                    A:this.vendor_type[0]["A"],
                    B:this.vendor_type[0]["B"],
                    C:this.vendor_type[0]["C"],
                    D:this.vendor_type[0]["D"]
                }
            )
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {
          this.$swal({
            title: "อัพเดทข้อมูลสำเร็จ!",
            icon: "success",
          }).then(function () {
            window.location.reload();
          });
        });

    },

    async updateType(index, id) {
      await axios
        .put(
          process.env.MIX_DEV_API + "/v1/antiques/updateType",
          {
            _id: id,
            detail_th: this.item_types[index].detail_th,
            detail_en: this.item_types[index].detail_en,
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {
          this.$swal({
            title: "อัพเดทข้อมูลสำเร็จ!",
            icon: "success",
          }).then(function () {
            window.location.reload();
          });
        });
    },
    async updateDetail(index, id) {
      await axios
        .put(
          process.env.MIX_DEV_API + "/v1/antiques/updatedetail",
          {
            _id: id,
            detail_name_th: this.item_detail_products[index].detail_name_th,
            detail_name_en: this.item_detail_products[index].detail_name_en,
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((response) => {
          this.$swal({
            title: "อัพเดทข้อมูลสำเร็จ!",
            icon: "success",
          }).then(function () {
            // window.location.reload();
          });
        });
    },
    async deleteType(id) {
      this.$swal({
        title: "คุณแน่ใจหรือไม่?",
        text: "คุณต้องการลบหมวดหมู่นี้หรือไม่!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "ใช่, ฉันต้องการลบ!",
      }).then(async (result) => {
        if (result.isConfirmed) {
          await axios
            .put(
              process.env.MIX_DEV_API + "/v1/antiques/deletetypedata",
              {
                _id: id,
              },
              {
                headers: {
                  "ngrok-skip-browser-warning": "true",
                },
              }
            )
            .then((response) => {
              this.$swal({
                title: "ลบข้อมูลสำเร็จ!",
                icon: "success",
              }).then(function () {
                window.location.reload();
              });
            });
        }
      });
    },

    async deleteDetail(id) {
      this.$swal({
        title: "คุณแน่ใจหรือไม่?",
        text: "คุณต้องการลบหมวดหมู่นี้หรือไม่!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "ใช่, ฉันต้องการลบ!",
      }).then(async (result) => {
        if (result.isConfirmed) {
          await axios
            .put(
              process.env.MIX_DEV_API + "/v1/antiques/deletedetail",
              {
                detail_id: id,
              },
              {
                headers: {
                  "ngrok-skip-browser-warning": "true",
                },
              }
            )
            .then((response) => {
              this.$swal({
                title: "ลบข้อมูลสำเร็จ!",
                icon: "success",
              }).then(function () {
                // window.location.reload();
              });
            });
        }
      });
    },

    async deleteCategory(id) {
      this.$swal({
        title: "คุณแน่ใจหรือไม่?",
        text: "คุณต้องการลบหมวดหมู่นี้หรือไม่!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "ใช่, ฉันต้องการลบ!",
      }).then(async (result) => {
        if (result.isConfirmed) {
          await axios
            .put(
              process.env.MIX_DEV_API + "/v1/antiques/delete",
              {
                _id: id,
              },
              {
                headers: {
                  "ngrok-skip-browser-warning": "true",
                },
              }
            )
            .then((response) => {
              this.$swal({
                title: "ลบข้อมูลสำเร็จ!",
                icon: "success",
              }).then(function () {
                window.location.reload();
              });
            });
        }
      });

      //         await axios
      //         .delete(
      //           process.env.MIX_DEV_API + "/v1/antiques/delete",
      //           {
      //             _id: id,
      //           },
      //           {
      //             headers: {
      //               "ngrok-skip-browser-warning": "true",
      //             },
      //           }
      //         )
      //         .then((response) => {
      //             this.$swal({
      //   title: "ลบข้อมูลสำเร็จ!",
      //   icon: "success"
      // }).then(function(){
      //                     window.location.reload();

      // });

      //         })
    },

    async chooseDetailProducts(event) {
      console.log("deeee", event);

      const self = this;

      //   axios({
      //     method: "get",
      //     url: "https://dummyjson.com/products",
      //   }).then(function (response) {
      //     console.log("response.data.products", response.data.products);
      //     self.item_vendor = [
      //       {
      //         category_name_th: "9999",
      //         category_name_en: "1111",
      //       },
      //     ];
      //   });
      this.choose_detail_id = event.detail_id;

      await axios
        .post(
          process.env.MIX_DEV_API + "/v1/antiques/getvendorbyid",
          {
            detail_id: event.detail_id,
          },
          {
            headers: {
              "ngrok-skip-browser-warning": "true",
            },
          }
        )
        .then((res) => {
          console.log(res);
          this.item_vendor = JSON.parse(res.data.data[0].all_details[0].vendor_data);
        //   vendor_type
        this.vendor_id = res.data.data[0].vendor_id;
        console.log("item_ven", this.item_vendor)
        this.vendor_type = [{
            A: [this.item_vendor.A[0]],
            B: [this.item_vendor.B[0]],
            C: [this.item_vendor.C[0]],
            D: [this.item_vendor.D[0]]
        }];

        console.log(this.vendor_type)
        });
    },
  },
};
</script>
