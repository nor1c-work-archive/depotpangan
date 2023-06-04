<template>
  <div>
    <div class="d-flex flex-column-fluid">
      <!--begin::Container-->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-lg-12 col-xl-12">
                <div
                  class="
                    card card-custom
                    gutter-b
                    bg-transparent
                    shadow-none
                    border-0
                  "
                >
                  <div
                    class="
                      card-header
                      align-items-center
                      border-bottom-dark
                      px-0
                    "
                  >
                    <div class="card-title mb-0">
                      <h3 class="card-label mb-0 font-weight-bold text-body">
                        Country Setting
                      </h3>
                    </div>
                    <div class="icons d-flex">
                      <button
                        class="btn ml-2 p-0 kt_notes_panel_toggle"
                        data-toggle="tooltip"
                        title=""
                        data-placement="right"
                        data-original-title="Check out more demos"
                        v-if="$parent.permissions.includes('country-manage')"
                      >
                        <span
                          class="
                            bg-secondary
                            h-30px
                            font-size-h5
                            w-30px
                            d-flex
                            align-items-center
                            justify-content-center
                            rounded-circle
                            shadow-sm
                          "
                          v-on:click="display_form = !display_form"
                        >
                          <svg
                            width="25px"
                            height="25px"
                            viewBox="0 0 16 16"
                            class="bi bi-plus white"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"
                            ></path>
                          </svg>
                        </span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card card-custom gutter-b bg-white border-0">
                  <div class="card-body">
                    <div>
                      <div class="table-responsive" id="printableTable">
                        <div
                          id="CouponSetting_wrapper"
                          class="dataTables_wrapper no-footer"
                        >
                          <div
                            class="dataTables_length"
                            id="CouponSetting_length"
                          >
                            <label
                              >Show
                              <select
                                name="CouponSetting_length"
                                class=""
                                v-model="limit"
                                v-on:change="fetchCountrySetting()"
                              >
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                              </select>
                              entries</label
                            >
                          </div>

                          <div
                            id="CouponSetting_filter"
                            class="dataTables_filter"
                          >
                            <label
                              >Search:<input
                                type="text"
                                class=""
                                placeholder=""
                                v-model="searchParameter"
                                @keyup="fetchCountrySetting()"
                            /></label>
                            <button
                              v-if="this.searchParameter != ''"
                              @click="clearSearch"
                            >
                              clear
                            </button>
                          </div>
                          <table
                            id="productUnitTable"
                            class="display dataTable no-footer"
                            role="grid"
                          >
                            <thead class="text-body">
                              <tr role="row">
                                <th
                                  class="sorting"
                                  tabindex="0"

                                  rowspan="1"
                                  colspan="1"
                                  aria-sort="ascending"
                                  aria-label="ID: activate to sort column descending"
                                  style="width: 31.25px"
                                  @click="sorting('id')"
                                  :class="
                                    (this.$data.sortType == 'asc' ||
                                      this.$data.sortType == 'ASC') &&
                                    this.$data.sortBy == 'id'
                                      ? 'sorting_asc'
                                      : (this.$data.sortType == 'desc' ||
                                          this.$data.sortType == 'DESC') &&
                                        this.$data.sortBy == 'id'
                                      ? 'sorting_desc'
                                      : 'sorting'
                                  "
                                >
                                  ID
                                </th>
                                <th
                                  class="sorting"
                                  tabindex="0"

                                  rowspan="1"
                                  colspan="1"
                                  aria-label="country_setting: activate to sort column ascending"
                                  style="width: 95.5288px"
                                  @click="sorting('code')"
                                  :class="
                                    (this.$data.sortType == 'asc' ||
                                      this.$data.sortType == 'ASC') &&
                                    this.$data.sortBy == 'code'
                                      ? 'sorting_asc'
                                      : (this.$data.sortType == 'desc' ||
                                          this.$data.sortType == 'DESC') &&
                                        this.$data.sortBy == 'code'
                                      ? 'sorting_desc'
                                      : 'sorting'
                                  "
                                >
                                  Name
                                </th>
                                <th
                                  class="sorting"
                                  tabindex="0"

                                  rowspan="1"
                                  colspan="1"
                                  aria-label="Phone No: activate to sort column ascending"
                                  style="width: 81.8109px"
                                >
                                  ISO Code 2
                                </th>
                                <th
                                  class="sorting"
                                  tabindex="0"

                                  rowspan="1"
                                  colspan="1"
                                  aria-label="Email: activate to sort column ascending"
                                  style="width: 114.84px"
                                  @click="sorting('type')"
                                  :class="
                                    (this.$data.sortType == 'asc' ||
                                      this.$data.sortType == 'ASC') &&
                                    this.$data.sortBy == 'type'
                                      ? 'sorting_asc'
                                      : (this.$data.sortType == 'desc' ||
                                          this.$data.sortType == 'DESC') &&
                                        this.$data.sortBy == 'type'
                                      ? 'sorting_desc'
                                      : 'sorting'
                                  "
                                >
                                  ISO Code 3
                                </th>
                                <th
                                  class="sorting"
                                  tabindex="0"

                                  rowspan="1"
                                  colspan="1"
                                  aria-label="Address: activate to sort column ascending"
                                  style="width: 158.462px"
                                >
                                  Address Format ID
                                </th>
                                <th
                                  class="sorting"
                                  tabindex="0"

                                  rowspan="1"
                                  colspan="1"
                                  aria-label="No Of Product: activate to sort column ascending"
                                  style="width: 108.67px"
                                >
                                  Country Code
                                </th>
                                <th
                                  class="sorting"
                                  tabindex="0"

                                  rowspan="1"
                                  colspan="1"
                                  aria-label="No Of Product: activate to sort column ascending"
                                  style="width: 108.67px"
                                >
                                  Status
                                </th>
                                <th
                                  v-if="
                                    $parent.permissions.includes(
                                      'country-manage'
                                    )
                                  "
                                  class="no-sort sorting_disabled"
                                  rowspan="1"
                                  colspan="1"
                                  aria-label="Action"
                                  style="width: 53.1891px"
                                >
                                  Action
                                </th>
                              </tr>
                            </thead>
                            <tbody class="kt-table-tbody text-dark">
                              <tr
                                class="kt-table-row kt-table-row-level-0 odd"
                                role="row"
                                v-for="country_setting in country_settings"
                                v-bind:key="country_setting.country_id"
                              >
                                <td class="sorting_1">
                                  {{ country_setting.country_id }}
                                </td>
                                <td>
                                  {{ country_setting.country_name }}
                                </td>
                                <td>
                                  {{ country_setting.iso_code_2 }}
                                </td>
                                <td>
                                  {{ country_setting.iso_code_3 }}
                                </td>
                                <td>
                                  {{ country_setting.address_format_id }}
                                </td>
                                <td>
                                  {{ country_setting.country_code }}
                                </td>
                                <td>
                                  <input
                                    type="checkbox"
                                    name="status"
                                    :id="country_setting.country_id"
                                    :checked="
                                      country_setting.status == 'active'
                                    "
                                    @click="setAsActive($event)"
                                  />
                                </td>
                                <td
                                  v-if="
                                    $parent.permissions.includes(
                                      'country-manage'
                                    )
                                  "
                                >
                                  <a
                                    href="javascript:void(0)"
                                    class="click-edit"
                                    id="click-edit1"
                                    data-toggle="tooltip"
                                    title=""
                                    data-placement="right"
                                    data-original-title="Check out more demos"
                                    @click="editCountrySetting(country_setting)"
                                    ><i class="fa fa-edit"></i
                                  ></a>
                                  <a
                                    class=""
                                    href="#"
                                    @click="
                                      deleteCountrySetting(
                                        country_setting.country_id
                                      )
                                    "
                                    ><i class="fa fa-trash"></i
                                  ></a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <ul class="pagination pagination-sm m-0 float-right">
                            <li
                              v-bind:class="[
                                { disabled: !pagination.prev_page_url },
                              ]"
                            >
                              <a
                                class="page-link"
                                href="#"
                                @click="
                                  fetchCountrySetting(pagination.prev_page_url)
                                "
                                >Previous</a
                              >
                            </li>

                            <li class="disabled">
                              <a class="page-link text-dark" href="#"
                                >Page {{ pagination.current_page }} of
                                {{ pagination.last_page }}</a
                              >
                            </li>

                            <li
                              v-bind:class="[
                                { disabled: !pagination.next_page_url },
                              ]"
                              class="page-item"
                            >
                              <a
                                class="page-link"
                                href="#"
                                @click="
                                  fetchCountrySetting(pagination.next_page_url)
                                "
                                >Next</a
                              >
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      class="offcanvas offcanvas-right kt-color-panel p-5 kt_notes_panel"
      v-if="display_form"
      :class="display_form ? 'offcanvas-on' : ''"
    >
      <div
        class="
          offcanvas-header
          d-flex
          align-items-center
          justify-content-between
          pb-3
        "
      >
        <h4 class="font-size-h4 font-weight-bold m-0">Add Country Setting</h4>
        <a
          href="#"
          class="
            btn btn-sm btn-icon btn-light btn-hover-primary
            kt_notes_panel_close
          "
          v-on:click="display_form = 0"
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
        </a>
      </div>
      <form id="myform">
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label class="text-dark">Name </label>
              <input
                type="text"
                name="text"
                v-model="country_setting.name"
                class="form-control"
              />
              <small
                class="form-text text-danger"
                v-if="errors.has('name')"
                v-text="errors.get('name')"
              ></small>
            </div>

            <div class="form-group">
              <label class="text-dark">ISO Code 2 </label>
              <input
                type="text"
                name="text"
                v-model="country_setting.iso_code_2"
                class="form-control"
              />
              <small
                class="form-text text-danger"
                v-if="errors.has('iso_code_2')"
                v-text="errors.get('iso_code_2')"
              ></small>
            </div>

            <div class="form-group">
              <label class="text-dark">ISO Code 3 </label>
              <input
                type="text"
                name="text"
                v-model="country_setting.iso_code_3"
                class="form-control"
              />
              <small
                class="form-text text-danger"
                v-if="errors.has('iso_code_3')"
                v-text="errors.get('iso_code_3')"
              ></small>
            </div>

            <div class="form-group">
              <label class="text-dark">Address Format ID </label>
              <input
                type="text"
                name="text"
                v-model="country_setting.address_format_id"
                class="form-control"
              />
              <small
                class="form-text text-danger"
                v-if="errors.has('address_format_id')"
                v-text="errors.get('address_format_id')"
              ></small>
            </div>

            <div class="form-group">
              <label class="text-dark">Country Code </label>
              <input
                type="text"
                name="text"
                v-model="country_setting.country_code"
                class="form-control"
              />
              <small
                class="form-text text-danger"
                v-if="errors.has('country_code')"
                v-text="errors.get('country_code')"
              ></small>
            </div>

          </div>
        </div>
        <button
          type="button"
          @click="addUpdateCountrySetting()"
          class="btn btn-primary"
        >
          Submit
        </button>
      </form>
    </div>
  </div>
</template>

<script>
import ErrorHandling from "./../../ErrorHandling";
export default {
  data() {
    return {
      display_form: 0,
      country_setting: {
        id: "",
        name: "",
        iso_code_2: "",
        ise_code_3: "",
        amount: "",
        address_format_id: "",
        country_code: "",
        status: "active",
      },
      searchParameter: "",
      sortBy: "id",
      sortType: "ASC",
      limit: 10,
      error_message: "",
      edit: false,
      actions: false,
      status: "active",
      pagination: {},
      request_method: "",
      country_settings: [],
      token: [],
      errors: new ErrorHandling(),
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },

  methods: {
    fetchCountrySetting(page_url) {
      this.$parent.loading = true;
      let vm = this;
      page_url = page_url || "/api/admin/country";
      var arr = page_url.split("?");
      if (arr.length > 1) {
        page_url += "&limit=" + this.limit;
        console.warn("page_url", page_url);
      } else {
        page_url += "?limit=" + this.limit;
      }
      if (this.searchParameter != null) {
        page_url += "&searchParameter=" + this.searchParameter;
      }
      page_url += "&sortBy=" + this.sortBy + "&sortType=" + this.sortType;
      var responseData = {};

      axios
        .get(page_url, this.token)
        .then((res) => {
          this.country_settings = res.data.data;
          vm.makePagination(res.data.meta, res.data.links);
        })
        .finally(() => (this.$parent.loading = false));
    },

    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev,
      };

      this.pagination = pagination;
    },
    deleteCountrySetting(id) {
      if (confirm("Are You Sure?")) {
        this.$parent.loading = true;
        axios
          .delete(`/api/admin/country/${id}`, this.token)
          .then((res) => {
            if (res.data.status == "Success") {
              this.$toaster.success(res.data.message);
              this.fetchCountrySetting();
            }
          })
          .catch((err) => console.log(err))
          .finally(() => (this.$parent.loading = false));
      }
    },
    addUpdateCountrySetting() {
      this.$parent.loading = true;
      var url = "/api/admin/country";
      if (this.edit === false) {
        // Add
        this.request_method = "post";
      } else {
        // Update
        var url = "/api/admin/country/" + this.country_setting.id;
        this.request_method = "put";
      }
      axios[this.request_method](url, this.country_setting, this.token)
        .then((res) => {
          if (res.data.status == "Success") {
            this.display_form = 0;
            this.$toaster.success(res.data.message);
            this.clearForm();
            this.fetchCountrySetting();
          } else {
            this.$toaster.error(res.data.message);
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
    editCountrySetting(country_setting) {
      this.edit = true;
      this.display_form = 1;
      this.errors = new ErrorHandling();
      this.country_setting.id = country_setting.country_id;
      this.country_setting.name = country_setting.country_name;
      this.country_setting.iso_code_2 = country_setting.iso_code_2;
      this.country_setting.iso_code_3 = country_setting.iso_code_3;
      this.country_setting.address_format_id = country_setting.address_format_id;
      this.country_setting.country_code = country_setting.country_code;
    },
    clearForm() {
      this.edit = false;
      this.country_setting.id = null;
      this.country_setting.name = "";
      this.country_setting.iso_code_2 = "";
      this.country_setting.iso_code_3 = "";
      this.country_setting.amount = "";
      this.country_setting.expiry_date = "";
      this.country_setting.address_format_id = "";
      this.country_setting.country_code = "";
    },
    sorting(sortBy) {
      this.sortBy = sortBy;
      this.sortType =
        this.sortType == "asc" || this.sortType == "ASC"
          ? (this.sortType = "desc")
          : (this.sortType = "asc");
      this.fetchCountrySetting();
    },
    setAsActive(e) {
      status = e.target.checked ? 'active' : 'inactive';
      this.$parent.loading = true;
      var page_url =
        "/api/admin/country/" + e.target.id + "?status=" + status;
      axios
        .put(page_url, {}, this.token)
        .then((res) => {
          if (res.data.status == "Success") {
            this.display_form = 0;
            this.$toaster.success(res.data.message);
            this.fetchCountrySetting();
            // this.fetchLanguages();
          } else {
            this.$toaster.error(res.data.message);
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    clearSearch() {
      (this.searchParameter = ""), this.fetchCountrySetting();
    },
  },

  mounted() {
    var token = localStorage.getItem("token");
    this.token = {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    };
    this.fetchCountrySetting();
  },
};
</script>
