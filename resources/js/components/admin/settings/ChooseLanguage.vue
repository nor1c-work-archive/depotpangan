<template>
<div class="form-group row">
    <div class="col-md-12">
        <label>Language</label>
        <div class="form-group">
            <multiselect 
            v-model="business.language_id" 
            :options="options" 
            placeholder="Select Languages" 
            group-values="languages" 
            group-label="language" 
            :group-select="true" 
            :multiple="true" 
            label="language_name"
            track-by="id" 
            @input="onChange"
            >
                <span slot="noResult">Oops! No elements found. Consider changing the search query.</span>
            </multiselect>
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
                language_id: [],
            },
            languages: [],
            options: [
                {
                    languages: [],
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
						this.$toaster.success('Language has been updated successfully');
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

        fetchLanguageSetting(page_url) {
            this.$emit('updateLoadingState', true)
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            page_url = page_url || "/api/admin/language";
            axios
                .get(page_url,config)
                .then((res) => {
                this.languages = res.data.data;
                this.options[0].languages = res.data.data;
                console.warn("languages", this.options[0].languages);
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },


        clearForm() {
            this.business.language_id = "";
        },
    },
    mounted() {
        this.fetchLanguageSetting();
    },
};
</script>
