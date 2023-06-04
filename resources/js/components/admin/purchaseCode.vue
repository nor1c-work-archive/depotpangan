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
                                            <h3
                                                class="card-label mb-0 font-weight-bold text-body"
                                            >
                                                Purchase Code
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <div
                                    class="card card-custom gutter-b bg-white border-0"
                                >
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <label>Enter Purchase Code</label>
                                                <fieldset
                                                    class="form-group mb-3"
                                                >
                                                <input class="form-control" type="text" name="purchase_code" placeholder="Please Enter Purchase Code" v-model="purchase.purchase_code">
                                                </fieldset>
                                                <small
                                                    class="form-text text-danger"
                                                    v-if="
                                                        errors.has(
                                                            'purchase_code'
                                                        )
                                                    "
                                                    v-text="
                                                        errors.get(
                                                            'purchase_code'
                                                        )
                                                    "
                                                ></small>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-12 d-flex justify-content-end"
                                        >
                                            <button
                                                class="btn btn-primary"
                                                @click="purchaseCode()"
                                            >
                                                Submit
                                            </button>
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
import ErrorHandling from "./../../ErrorHandling";
export default {
    data() {
        return {
            display_form: 0,
            purchase: {
                purchase_code: "",
            },

            errors: new ErrorHandling(),
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        };
    },
    methods: {

        purchaseCode() {
            this.$parent.loading = true;

            var url = "/api/admin/verifyPurchaseCode";
            this.request_method = "post";

            axios[this.request_method](url, this.purchase, this.token)
                .then(res => {
                    if (res.data.status == "success") {
                        this.clearForm();
                        this.$toaster.success(res.data.message);
                        this.$router.push({ name: 'import-product' })
                    } else {
                        this.$toaster.error(res.data.message);
                    }
                })
                .catch(error => {
                    this.error_message = "";
                    this.errors = new ErrorHandling();
                    if (error.response.status == 422) {
                        if (error.response.data.status == "Error") {
                            this.$toaster.error(error.response.data.message);
                        } else {
                            this.errors.record(error.response.data.errors);
                        }
                    }
                })
                .finally(() => (this.$parent.loading = false));
        },

        clearForm() {
            this.display_form = 0;
            this.purchase = {
                purchase_code: "",
            };
            this.errors = new ErrorHandling();
        },

    },
    mounted() {
        var token = localStorage.getItem("token");
        this.token = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
    }
};
</script>
