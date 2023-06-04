<template>
<div class="form-group row">
    <div class="col-md-12">
        <label>Select TimeZone</label>
        <fieldset class="form-group mb-3">
            <select class="form-control" v-model="timezone.name">
                <option v-for="item in timezones" :value="item.timezone_name">
                    {{ item.timezone_name }}
                </option>
            </select>
        </fieldset>
    </div>


    

    <div class="col-md-12">
		<br />
        <button @click="updateBusinessLocation()" type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>
</template>

<script>
import Multiselect from "vue-multiselect";
import ErrorHandling from '../../../ErrorHandling'
export default {
    components: { Multiselect },
    data() {
        return {
            timezone: {
                name: "",
            },
            timezones: [],
            request_method: '',
            errors: new ErrorHandling(),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },

    methods: {

        updateBusinessLocation() {
            this.$emit('updateLoadingState', true)
            var data = this.timezone;
            var url = "/api/admin/set-timezone";
            this.request_method = "post";


            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            axios[this.request_method](url, this.timezone, config)
            .then(res => {
                    if (res.data.status == "Success") {
						this.$toaster.success('TimeZone has been updated successfully');
                        // this.clearForm();
                    }
                  else if(res.data.status == 'Error'){
                        this.$toaster.error(res.data.message)
                    }
                })
                .catch(err => {
                    if(err.response.data.status == 'Error'){
                        this.$toaster.error(err.response.data.message)
                    }
                })
                .finally(() => (this.$emit('updateLoadingState', false)));

        },

        fetchTimeZoneSetting(page_url) {
            this.$emit('updateLoadingState', true)
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            page_url = page_url || "/api/admin/timezone?getAllData=1";
            axios
                .get(page_url,config)
                .then((res) => {
                this.timezones = res.data.data;
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },
        defaultTimeZone(page_url) {
            this.$emit('updateLoadingState', true)
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            page_url = page_url || "/api/admin/timezone?is_default=1";
            axios
                .get(page_url,config)
                .then((res) => {
                this.timezone.name = res.data.data.timezone_name;
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },


        clearForm() {
            this.timezone.name = "";
        },
    },
    mounted() {
        this.fetchTimeZoneSetting();
        this.defaultTimeZone();
    },
};
</script>
