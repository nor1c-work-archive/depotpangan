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
                        State Setting
                      </h3>
                    </div>
                    <div class="icons d-flex">
                      <button
                        class="btn ml-2 p-0 kt_notes_panel_toggle"
                        data-toggle="tooltip"
                        title=""
                        data-placement="right"
                        data-original-title="Check out more demos"
                        v-if="$parent.permissions.includes('state-manage')"
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
                                v-on:change="fetchStateSetting()"
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
                                @keyup="fetchStateSetting()"
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
                                  aria-label="state_setting: activate to sort column ascending"
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
                                  State
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
                                  Country
                                </th>
                                <th
                                  class="sorting"
                                  tabindex="0"

                                  rowspan="1"
                                  colspan="1"
                                  aria-label="Email: activate to sort column ascending"
                                  style="width: 114.84px"
                                  
                                >
                                  Status
                                </th>

                                <th
                                  v-if="
                                    $parent.permissions.includes(
                                      'state-manage'
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
                                v-for="state_setting in state_settings"
                                v-bind:key="state_setting.id"
                              >
                                <td class="sorting_1">
                                  {{ state_setting.id }}
                                </td>
                                <td>
                                  {{ state_setting.name }}
                                </td>
                                <td>
                                  {{ state_setting.country.country_name }}
                                </td>
                                <td>
                                  <input
                                    type="checkbox"
                                    name="status"
                                    :id="state_setting.id"
                                    :checked="
                                      state_setting.status == 'active'
                                    "
                                    @click="setAsActive($event)"
                                  />
                                </td>
                                <td
                                  v-if="
                                    $parent.permissions.includes(
                                      'state-manage'
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
                                    @click="editStateSetting(state_setting)"
                                    ><i class="fa fa-edit"></i
                                  ></a>
                                  <a
                                    class=""
                                    href="#"
                                    @click="
                                      deleteStateSetting(
                                        state_setting.id
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
                                  fetchStateSetting(pagination.prev_page_url)
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
                                  fetchStateSetting(pagination.next_page_url)
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
              <label class="text-dark">State Name </label>
              <input
                type="text"
                name="text"
                v-model="state_setting.name"
                class="form-control"
              />
              <small
                class="form-text text-danger"
                v-if="errors.has('name')"
                v-text="errors.get('name')"
              ></small>
            </div>

            <div class="form-group">
              <label class="text-dark">Country </label>
              <select v-model="state_setting.country_id">
                <option value="">Select Country</option>
                <option v-for="country in countries" v-bind:value="country.country_id">{{ country.country_name }}</option>
              </select>
                <small class="form-text text-danger" v-if="errors.has('country_id')" v-text="errors.get('country_id')"></small>
            </div>

          </div>
        </div>
        <button
          type="button"
          @click="addUpdateStateSetting()"
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
      state_setting: {
        id: "",
        name: "",
        country_id: "",
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
      state_settings: [],
      countries: [],
      token: [],
      errors: new ErrorHandling(),
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },

  methods: {
    fetchStateSetting(page_url) {
      this.$parent.loading = true;
      let vm = this;
      page_url = page_url || "/api/admin/state";
      var arr = page_url.split("?");
      if (arr.length > 1) {
        page_url += "&limit=" + this.limit;
      } else {
        page_url += "?limit=" + this.limit;
      }
      if (this.searchParameter != null) {
        page_url += "&searchParameter=" + this.searchParameter;
      }
    //   page_url += "&sortBy=" + this.sortBy + "&sortType=" + this.sortType;
      page_url += '&sortBy='+this.sortBy+'&sortType='+this.sortType+'&getCountry=1';
      var responseData = {};

      axios
        .get(page_url, this.token)
        .then((res) => {
          this.state_settings = res.data.data;
          console.warn("state data", this.state_settings);
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

    fetchCountrySetting(page_url) {
      this.$parent.loading = true;
      page_url = page_url || "/api/admin/country";
      page_url += '?getAllData=1';
      axios
        .get(page_url, this.token)
        .then((res) => {
          this.countries = res.data.data;
          console.warn("countries", this.countries);
        })
        .finally(() => (this.$parent.loading = false));
    },

    deleteStateSetting(id) {
      if (confirm("Are You Sure?")) {
        this.$parent.loading = true;
        axios
          .delete(`/api/admin/state/${id}`, this.token)
          .then((res) => {
            if (res.data.status == "Success") {
              this.$toaster.success(res.data.message);
              this.fetchStateSetting();
            }
          })
          .catch((err) => console.log(err))
          .finally(() => (this.$parent.loading = false));
      }
    },
    addUpdateStateSetting() {
      this.$parent.loading = true;
      var url = "/api/admin/state";
      if (this.edit === false) {
        // Add
        this.request_method = "post";
      } else {
        // Update
        var url = "/api/admin/state/" + this.state_setting.id;
        this.request_method = "put";
      }
      axios[this.request_method](url, this.state_setting, this.token)
        .then((res) => {
          if (res.data.status == "Success") {
            this.display_form = 0;
            this.$toaster.success(res.data.message);
            this.clearForm();
            this.fetchStateSetting();
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
    editStateSetting(state_setting) {
      this.edit = true;
      this.display_form = 1;
      this.errors = new ErrorHandling();
      this.state_setting.id = state_setting.id;
      this.state_setting.name = state_setting.name;
      this.state_setting.country_id = state_setting.country_id;
    },
    clearForm() {
      this.edit = false;
      this.state_setting.id = null;
      this.state_setting.name = "";
      this.state_setting.country_id = "";
    },
    sorting(sortBy) {
      this.sortBy = sortBy;
      this.sortType =
        this.sortType == "asc" || this.sortType == "ASC"
          ? (this.sortType = "desc")
          : (this.sortType = "asc");
      this.fetchStateSetting();
    },
    setAsActive(e) {
      status = e.target.checked ? 'active' : 'inactive';
      this.$parent.loading = true;
      var page_url =
        "/api/admin/state/" + e.target.id + "?status=" + status;
      axios
        .put(page_url, {}, this.token)
        .then((res) => {
          if (res.data.status == "Success") {
            this.display_form = 0;
            this.$toaster.success(res.data.message);
            this.fetchStateSetting();
            // this.fetchLanguages();
          } else {
            this.$toaster.error(res.data.message);
          }
        })
        .finally(() => (this.$parent.loading = false));
    },
    clearSearch() {
      (this.searchParameter = ""), this.fetchStateSetting();
    },
  },
  mounted() {
    var token = localStorage.getItem("token");
    this.token = {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    };
    this.fetchStateSetting();
    this.fetchCountrySetting();
  },
};
</script>
