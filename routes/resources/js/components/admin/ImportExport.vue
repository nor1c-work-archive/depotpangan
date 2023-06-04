<template>
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-xl-12">
          <div
            class="card card-custom bg-transparent shadow-none border-0 mb-0"
          >
            <div class="card-header align-items-center border-bottom-dark px-0">
              <div class="card-title mb-0">
                <h3 class="card-label mb-0 font-weight-bold text-body">
                  Import Export
                </h3>
              </div>
            </div>
          </div>
          <br />
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a class="btn btn-primary white p-2 ml-2" href="/sample/sample.zip" style="float: right">Sample</a>
          <div>
            <!-- <button
              style="float: right"
              type="button"
              title="Sample"
              class="btn btn-primary white p-2 ml-2"
              @click="sample()"
              >
                Sample
            </button> -->
            
          </div>

          <div
            id="generalgallary"
            class="gallary0 linked card card-custom gutter-b bg-white border-0"
          >
            <div class="card-header border-0 align-items-center">

              <div class="icons d-flex">

                <button
                  type="button"
                  title="Add New"
                  class="btn btn-primary white p-2 ml-2"
                  data-toggle="modal"
                  data-target="#imagepopup"
                  @click="toggleModal()"
                >
                  Import
                </button>
                <!--Basic Modal -->
                <div
                  class="modal fade text-left"
                  :class="{ show: showModal }"
                  id="imagepopup"
                  tabindex="-1"
                  role="dialog"
                  aria-labelledby="myModalLabel1"
                  :style="[
                    showModal
                      ? { display: 'block !important' }
                      : { display: 'none' },
                  ]"
                >
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel1">
                          Add File Here
                        </h3>
                        <button
                          type="button"
                          class="
                            close
                            rounded-pill
                            btn btn-sm btn-icon btn-light btn-hover-primary
                            m-0
                          "
                          data-dismiss="modal"
                          aria-label="Close"
                          @click="toggleModal()"
                        >
                          <svg
                            width="20px"
                            height="20px"
                            viewBox="0 0 16 16"
                            class="bi bi-x"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                            ></path>
                          </svg>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>
                          Click in the box for upload file (we accept zip).
                        </p>
                        <div class="avatar-upload mb-3">
                          <div class="avatar-edit">
                            <input
                              type="file"
                              id="zipUpload"
                              accept=".zip"
                              @change="onFileChange"
                            />

                            <label for="zipUpload"> zip upload </label>
                          </div>
                          <div class="avatar-preview">
                            <div id="imagePreview" class="rounded">
                              <img
                                :src="url"
                                style="height: 194px; width: 100%"
                              />
                            </div>
                          </div>
                          <small
                            class="form-text text-danger"
                            v-if="errors.has('file')"
                            v-text="errors.get('file')"
                          ></small>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button
                          type="button"
                          class="btn btn-light"
                          data-dismiss="modal"
                          @click="toggleModal()"
                        >
                          <span class="">Close</span>
                        </button>
                        <button
                          type="button"
                          class="btn btn-primary ml-1"
                          data-dismiss="modal"
                          @click="importZip()"
                        >
                          <span class="">Submit</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div
            id="generalgallary"
            class="gallary0 linked card card-custom gutter-b bg-white border-0"
          >
            <div class="card-header border-0 align-items-center">

              <div class="icons d-flex">

                <button
                  type="button"
                  title="Add New"
                  class="btn btn-primary white p-2 ml-2"
                  @click="exportProduct()"
                >
                  Export
                </button>
              </div>
              <a class="download" href="/export/products.zip" v-if="linkShow">Download Link</a>
            </div>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
            <div class="" v-if="stats">
                <p class="stats"> {{ this.simple_products }} New Simple Products</p>
                <p class="stats"> {{ this.variable_products }} New Variable Products</p>
                <p class="stats"> {{ this.new_attributes }} New Attributes</p>
                <p class="stats"> {{ this.new_variations }} New Variations</p>
                <p class="stats"> {{ this.new_categories }} New Categories</p>
                <p class="stats"> {{ this.new_brands }} New Brands</p>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ErrorHandling from "./../../ErrorHandling";

export default {
  data() {
    return {
      meta: {},
      error_message: "",
      request_method: "",
      token: [],
      file: '',
      linkShow: false,
      sampleLink: false,
      simple_products: '', 
      variable_products: '', 
      new_attributes: '', 
      new_variations: '', 
      new_categories: '',
      new_brands: '', 
      showModal: false,
      stats: false,
      errors: new ErrorHandling(),
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },

  methods: {


    onFileChange(e) {
        this.file = e.target.files[0];
        console.warn('file', this.file);
    },
    importZip() {
      this.$parent.loading = true;
      var url = "/api/admin/importexport";
      this.request_method = "post";
      var formData = new FormData();
      formData.append('zip', this.file);

      axios[this.request_method](url, formData, this.token)
        .then((res) => {
          if (res.data.status == "Success") {
            this.$toaster.success(res.data.message);
            this.stats = true;
            this.simple_products = res.data.simple_products;
            this.variable_products = res.data.variable_products;
            this.new_attributes = res.data.new_attributes;
            this.new_brands = res.data.new_brands;
            this.new_categories = res.data.new_categories;
            this.new_variations = res.data.new_variations;

            this.clearForm();
            this.fetchgallaries();
          } else {
            this.$toaster.error(res.data.message);
            this.stats = false;
          }
        })
        .catch((error) => {
          this.error_message = "";
          this.errors = new ErrorHandling();
          if (error.response.status == 422) {
            if (error.response.data.status == "Error") {
              this.error_message = error.response.data.message;
            } else {
              this.errors.record(error.response.data.errors);
            }
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    sample() {
      this.$parent.loading = true;
      var url = "/api/admin/sample";
      this.request_method = "get";

      axios[this.request_method](url, this.token)
        .then((res) => {
          if (res.data.status == "Success") {
            console.log('link', res.data.data);
            this.sampleLink = true;
            this.$toaster.success(res.data.message);
            this.clearForm();
            this.fetchgallaries();
          } else {
            this.$toaster.error(res.data.message);
            this.sampleLink = false;
          }
        })
        .catch((error) => {
          this.error_message = "";
          this.errors = new ErrorHandling();
          if (error.response.status == 422) {
            if (error.response.data.status == "Error") {
              this.error_message = error.response.data.message;
            } else {
              this.errors.record(error.response.data.errors);
            }
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    exportProduct() {
      this.$parent.loading = true;
      var url = "/api/admin/export";
      this.request_method = "get";

      axios[this.request_method](url, this.token)
        .then((res) => {
          if (res.data.status == "Success") {
            console.log('link', res.data.data);
            this.linkShow = true;
            this.$toaster.success(res.data.message);
            this.clearForm();
            this.fetchgallaries();
          } else {
            this.$toaster.error(res.data.message);
            this.linkShow = false;
          }
        })
        .catch((error) => {
          this.error_message = "";
          this.errors = new ErrorHandling();
          if (error.response.status == 422) {
            if (error.response.data.status == "Error") {
              this.error_message = error.response.data.message;
            } else {
              this.errors.record(error.response.data.errors);
            }
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    clearForm() {
      this.showModal = false;
      this.file = "";
      this.gallary_tags = [];
      this.selectedImages = [];
    },
    toggleModal() {
      this.showModal = !this.showModal;
    },
  },
  mounted() {
    var token = localStorage.getItem("token");
    this.token = {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    };
  },
};
</script>
