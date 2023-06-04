<template>
<div>
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                                <div class="card-header align-items-center  border-bottom-dark px-0">
                                    <div class="card-title mb-0 w-100">
                                        <h3 class="card-label mb-0 font-weight-bold text-body">
                                            Newsletter Contact
                                        </h3>
                                        <button
                                            type="button"
                                            title="Add New"
                                            class="btn btn-primary white p-2 ml-2"
                                            @click="exportNewsletter()"
                                            style="float:right">
                                            Export
                                        </button>
                                        <a class="download" href="/export/newslettercontact.csv" v-if="linkShow" style="float:right">Download Link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-body">
                                    <div>
                                        <div class=" table-responsive" id="printableTable">

                                            <div id="productbrandTable_wrapper" class="dataTables_wrapper no-footer">

                                                <div class="dataTables_length" id="productbrandTable_length"><label>Show
                                                        <select name="productbrandTable_length"  class="" v-model="limit" v-on:change="fetchNewsletter()">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                            <option value="200">200</option>
                                                            <option value="500">500</option>
                                                            <option value="1000">1000</option>
                                                        </select> entries</label></div>

                                                <div id="productbrandTable_filter" class="dataTables_filter">
                                                    <label>Search:<input type="text" class="" placeholder=""  v-model="searchParameter" @keyup="fetchNewsletter()"></label>
                                                    <button style="padding: 0.375rem 0.75rem !important;" class="btn btn-light  font-weight-bold mr-1 mb-1" v-if="this.searchParameter != ''" @click="clearSearch"> Clear </button>
                                                </div>
                                                <table id="productbrandTable" class="display dataTable no-footer" role="grid">
                                                    <thead class="text-body">
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0"  rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 31.25px;" @click="sorting('id')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'id'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'id' ? 'sorting_desc' : 'sorting'">
                                                                ID
                                                            </th>
                                                            <th class="sorting" tabindex="0"  rowspan="1" colspan="1" aria-label="brand: activate to sort column ascending" style="width: 95.5288px;" @click="sorting('name')" :class="(this.$data.sortType == 'asc' || this.$data.sortType == 'ASC') && this.$data.sortBy == 'name'  ? 'sorting_asc' : (this.$data.sortType == 'desc' || this.$data.sortType == 'DESC') && this.$data.sortBy == 'name' ? 'sorting_desc' : 'sorting'">
                                                                Name
                                                            </th>
                                                            <th class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width: 53.1891px;">
                                                                Email
                                                            </th>
                                                            <th class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width: 53.1891px;">
                                                                Date
                                                            </th>
                                                            <th class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width: 53.1891px;">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="kt-table-tbody text-dark">
                                                        <tr class="kt-table-row kt-table-row-level-0 odd" role="row" v-for="newsletter in newsletters" v-bind:key="newsletter.newslettercontact_id">
                                                            <td class="sorting_1">
                                                                {{newsletter.newslettercontact_id}}
                                                            </td>
                                                            <td>
                                                                {{ newsletter.newslettercontact_name }}
                                                            </td>
                                                            <td>
                                                                {{ newsletter.newslettercontact_email }}
                                                            </td>
                                                            <td>
                                                                {{ newsletter.date }}
                                                            </td>
                                                            <td v-if="$parent.permissions.includes('NewsletterContact-delete')">
                                                                <a class="" href="javascript:void(0)" @click="deleteNewsletter(newsletter.newslettercontact_id)"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <ul class="pagination pagination-sm m-0 float-right">
                                                    <li v-bind:class="[{disabled: !pagination.prev_page_url}]"><button class="page-link" href="javascript:void(0)" @click="fetchNewsletter(pagination.prev_page_url)">Previous</button></li>

                                                    <li class="disabled"><button class="page-link text-dark" href="javascript:void(0)">Page {{ pagination.current_page }} of {{ pagination.last_page }}</button></li>

                                                    <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><button class="page-link" href="javascript:void(0)" @click="fetchNewsletter(pagination.next_page_url)">Next</button></li>
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
</div>
</template>

<script>
import ErrorHandling from "../../ErrorHandling";

export default {
    data() {
        return {
            searchParameter: '',
            sortBy: 'id',
            sortType: 'ASC',
            limit: 10,
            pagination: {},
            newsletters: [],
            token: [],
            linkShow: false,
            errors: new ErrorHandling(),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        };
    },

    methods: {

        fetchNewsletter(page_url) {
            let vm = this;
            page_url = page_url || "/api/admin/newslettercontact";
            var arr = page_url.split('?');

            if (arr.length > 1) {
                page_url += '&limit=' + this.limit;
            } else {
                page_url += '?limit=' + this.limit;
            }
            if (this.searchParameter != null) {
                page_url += '&searchParameter=' + this.searchParameter;
            }
            page_url += '&sortBy=' + this.sortBy + '&sortType=' + this.sortType + '&getDetail=1';
            var responseData = {};

            axios.get(page_url, this.token).then(res => {
                this.newsletters = res.data.data;
                vm.makePagination(res.data.meta, res.data.links);
            }).finally(() => (this.$parent.loading = false));
        },

        makePagination(meta, links) {
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            };

            this.pagination = pagination;
        },
        deleteNewsletter(id) {
            if (confirm('Are You Sure?')) {
                this.$parent.loading = true;
                axios.delete(`/api/admin/newslettercontact/${id}`, this.token)
                    .then(res => {
                        if (res.data.status == "Success") {
                            this.$toaster.success('Newsletter Contact has been updated successfully')
                            this.fetchNewsletter();
                        }

                    })
                    .catch(error =>{
                        if (error.response.status == 422) {
                            if(error.response.data.status == 'Error'){
                                this.$toaster.error(error.response.data.message)
                            } 
                        }
                    })
                    .finally(() => (this.$parent.loading = false));
            }
        },

        exportNewsletter() {
            this.$parent.loading = true;
            var url = "/api/admin/newslettercontact-csv";
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

        sorting(sortBy) {
            this.sortBy = sortBy;
            this.sortType = this.sortType == 'asc' || this.sortType == 'ASC' ? this.sortType = 'desc' : this.sortType = 'asc';
            this.fetchNewsletter();
        },
        clearSearch(){
            this.searchParameter = "",
            this.fetchNewsletter();
        }
    },
    mounted() {

        var token = localStorage.getItem('token');
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        this.fetchNewsletter();
    }
};
</script>
