<template>
<div class="form-group row">
    <div class="col-md-12">
        <label>Country</label>
        <div class="form-group">
            <multiselect 
            v-model="business.country_id" 
            :options="options" 
            placeholder="Select Countries" 
            group-values="countries" 
            group-label="language" 
            :group-select="true" 
            :multiple="true" 
            label="country_name"
            track-by="country_id" 
            @input="onChange"
            >
                <span slot="noResult">Oops! No elements found. Consider changing the search query.</span>
            </multiselect>
        </div>
    </div>
    <div class="col-md-12">
        <label>State</label>
        <div class="form-group">
            <multiselect 
            v-model="business.state_id" 
            :options="options" 
            placeholder="Select States" 
            group-values="states" 
            group-label="language" 
            :group-select="true" 
            :multiple="true" 
            label="name"
            track-by="id" 
            @input="onChangeState"
            >
                <span slot="noResult">Oops! No elements found. Consider changing the search query.</span>
            </multiselect>
        </div>
    </div>
    <div class="col-md-12">
        <label>City</label>
        <div class="form-group">
            <multiselect 
            v-model="business.city_id" 
            :options="options" 
            placeholder="Select City" 
            group-values="cities" 
            group-label="language" 
            :group-select="true" 
            :multiple="true" 
            label="name"
            track-by="id" 
            >
                <span slot="noResult">Oops! No elements found. Consider changing the search query.</span>
            </multiselect>
        </div>
    </div>
    <div class="col-md-12">
        <label>Same County/state/city for Billing</label>
        <div class="form-group">
            <input
            type="checkbox"
            name="value"
            :id="business_general.id"
            :checked="
                business_general.setting_value == '1'
            "
            @click="setAsActive($event)"
            />
        </div>
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
            business: {
                country_id: [],
                state_id: [],
                city_id: []
            },
            business_general: {
                id: "",
                key: ["same_for_billing"],
                value: [],
                setting_value: '',
            },
            countries: [],
            states: [],
            cities: [],
            options: [
                {
                    countries: [],
                    states: [],
                    cities: [],
                    language: 'Select All',
                }
            ],
            request_method: '',
            errors: new ErrorHandling(),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },

    methods: {

        updateBusinessLocation() {
            this.$emit('updateLoadingState', true)
            var data = this.business;
            var url = "/api/admin/updateLocation";
            this.request_method = "post";


            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            axios[this.request_method](url, this.business, config)
            .then(res => {
                    if (res.data.status == "Success") {
						this.$toaster.success('Locations has been updated successfully');
                        this.clearForm();
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

        fetchCountrySetting(page_url) {
            this.$emit('updateLoadingState', true)
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            page_url = page_url || "/api/admin/country";
            page_url += '?getAllData=1';
            axios
                .get(page_url,config)
                .then((res) => {
                this.countries = res.data.data;
                this.options[0].countries = res.data.data;
                console.warn("countries", this.options[0].countries);
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },

        onChange(value) {
            this.$emit('updateLoadingState', true)

            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            let arr = this.business.country_id;
            let param = [];
            for (var i = 0; i < arr.length; i++) {
                param.push(arr[i].country_id);
            }

            console.log('country_id', param);

            axios.get('/api/admin/state?getAllData=1&country_id='+param, config).then((res) => {
                this.states = res.data.data;
                this.options[0].states = res.data.data;
                console.warn("states", this.states);
            }).finally(() => (this.$emit('updateLoadingState', false)));
        },

        onChangeState(value) {
            console.log('state_value', value);

            this.$emit('updateLoadingState', true)

            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            let arr1 = this.business.state_id;
            let param1 = [];
            for (var i = 0; i < arr1.length; i++) {
                param1.push(arr1[i].id);
            }

            console.log('state_idww', param1);

            axios.get('/api/admin/city?getAllData=1&state_id='+param1, config).then((res) => {
                this.cities = res.data.data;
                this.options[0].cities = res.data.data;
                console.warn("cities", this.cities);
            }).finally(() => (this.$emit('updateLoadingState', false)));
        },

        fetchSetting(page_url) {
            this.$emit('updateLoadingState', true)
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            page_url = page_url || "/api/admin/setting";
            page_url += '?getSameBilling=1';
            axios
                .get(page_url,config)
                .then((res) => {
                this.business_general = res.data.data;
                console.warn("same_setting", this.business_general);
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },

        setAsActive(e) {
            status = e.target.checked ? '1' : '0';
            this.business_general.value = [status];
            this.business_general.key = ['same_for_billing'];
            this.$emit('updateLoadingState', true)
            var token = localStorage.getItem('token');
            var type = 'business_general';
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};
            var page_url =
                "/api/admin/setting/"+type;
            axios
                .put(page_url, this.business_general, config)
                .then((res) => {
                if (res.data.status == "Success") {
                    this.display_form = 0;
                    this.$toaster.success(res.data.message);
                } else {
                    this.$toaster.error(res.data.message);
                }
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },

        clearForm() {
            this.business.country_id = "";
            this.business.state_id = "";
            this.business.city_id = "";
        },
    },
    mounted() {
        this.fetchCountrySetting();
        this.onChange();
        this.onChangeState();
        this.fetchSetting();
    },
};
</script>
