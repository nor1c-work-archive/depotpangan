<template>
<div class="form-group row">
    <!-- <div class="col-md-12">
        <label>Subject</label>
        <fieldset class="form-group mb-3">
            <input type="text" class="form-control border-dark" placeholder="" v-model="emailsetting.subject" ref="subject">
            <small class="form-text text-danger" v-if="errors.has('subject')" v-text="errors.get('subject')"></small>
        </fieldset>
    </div> -->
    <div class="col-md-12">
        <label>Forget Email Template</label>
        <fieldset class="form-group mb-3">
            <textarea type="text" class="form-control border-dark" cols="12" rows="12" v-model="emailsetting.forget_email_template"></textarea>
            <small class="form-text text-danger" v-if="errors.has('body')" v-text="errors.get('body')"></small>
        </fieldset>
    </div>
    <div class="col-md-12">
        <label>Contact Us Email Template</label>
        <fieldset class="form-group mb-3">
            <textarea type="text" class="form-control border-dark" cols="12" rows="12" v-model="emailsetting.contact_us_email_template"></textarea>
            <small class="form-text text-danger" v-if="errors.has('body')" v-text="errors.get('body')"></small>
        </fieldset>
    </div>
    <div class="col-md-12">
        <label>Welcome Email Template</label>
        <fieldset class="form-group mb-3">
            <textarea type="text" class="form-control border-dark" cols="12" rows="12" v-model="emailsetting.welcome_email_template"></textarea>
            <small class="form-text text-danger" v-if="errors.has('body')" v-text="errors.get('body')"></small>
        </fieldset>
    </div>
    <div class="col-md-12">
        <label>Order Email Template</label>
        <fieldset class="form-group mb-3">
            <textarea type="text" class="form-control border-dark" cols="12" rows="12" v-model="emailsetting.order_email_template"></textarea>
            <small class="form-text text-danger" v-if="errors.has('body')" v-text="errors.get('body')"></small>
        </fieldset>
    </div>

    <div class="col-md-12">
		<br />
        <button @click="updateSetting(emailsetting)" type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>
</template>

<script>
import ErrorHandling from './../../../ErrorHandling'
export default {
    data() {
        return {
            emailsetting: {
                forget_email_template:'',
                contact_us_email_template:'',
                welcome_email_template:'',
                order_email_template:''
            },
            errors: new ErrorHandling(),
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },

    methods: {
        fetchSetting() {
            this.$emit('updateLoadingState', true)
            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };
            var responseData = {};

            // axios.get('/api/admin/email_template_setting?type=type', config)
            //     .then(res => {
            //         console.clear();
            //         console.log('email template', res.data.data);
            //         if(res.data.data.length > 0){
            //             console.warn("emailtemplates", res.data.data);
            //             this.emailsettings = res.data.data;
            //         }
            //     })
            //     .finally(() => (this.$emit('updateLoadingState', false)));

            axios.get('/api/admin/setting?type=email_template', config)
                .then(res => {
                    for (var i = 0; i < res.data.data.length; i++) {
                        Object.assign(responseData, {
                            [res.data.data[i].setting_key]: res.data.data[i].setting_value
                        });
                    }
                    console.log('emai template data', responseData);
                    this.emailsetting = responseData;
                })
                .finally(() => (this.$emit('updateLoadingState', false)));
        },

        // updateSetting(emailsetting) {
        //     console.warn("emailupdatesetting", emailsetting);
        //     // this.$emit('updateLoadingState', true)
        //     // var token = localStorage.getItem('token');
        //     // const config = {
        //     //     headers: {
        //     //         Authorization: `Bearer ${token}`
        //     //     }
        //     // };

        //     // axios.post('/api/admin/email_template_setting',emailsetting, config)
        //     //     .then(res => {
        //     //         if (res.data.status == "Success") {
        //     //             this.errors = new ErrorHandling;
		// 	// 			this.$toaster.success('Settings has been updated successfully')
        //     //         }
        //     //       else if(res.data.status == 'Error'){
        //     //             this.$toaster.error(res.data.message)
        //     //         }
                    
        //     //     })
        //     //     .catch(error => {
		// 	// 		this.error_message = '';
		// 	// 		this.errors = new ErrorHandling();
		// 	// 		if (error.response.status == 422) {
		// 	// 			if(error.response.data.status == 'Error'){
		// 	// 				this.error_message = error.response.data.message;
		// 	// 			}
		// 	// 			else{
		// 	// 				this.errors.record(error.response.data.errors);
		// 	// 			}
		// 	// 		}
		// 	// 	})
        //     //     .finally(() => (this.$emit('updateLoadingState', false)));

        // }

        updateSetting() {
            this.$emit('updateLoadingState', true);
            var emailsetting = Object.entries(this.emailsetting);
            var key = [];
            var value = [];

            for (var i = 0; i < emailsetting.length; i++) {
                key.push(emailsetting[i][0]);
                value.push(emailsetting[i][1])
            }
            

            console.log("helooo", key, value);

            var token = localStorage.getItem('token');
            const config = {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            };

            axios.post('/api/admin/setting/email_template', {
                    _method: 'PUT',
                    key,
                    value
                }, config)
                .then(res => {
                    if (res.data.status == "Success") {
						this.$toaster.success('Settings has been updated successfully')
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

        }
    },
    mounted() {
        this.fetchSetting();
    }
};
</script>
