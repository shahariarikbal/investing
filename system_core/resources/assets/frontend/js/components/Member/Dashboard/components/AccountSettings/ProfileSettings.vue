<template>
    <div
        class="tab-pane fade active show"
        id="account-settings-profile"
        style="position: relative"
    >
        <div id="account-settings-loading" style="display: none">
            <i
                class="fa fa-spinner fa-pulse fa-5x fa-fw"
                aria-hidden="true"
            ></i>
        </div>

        <div class="row mb-5">
            <div class="form-group col-md-12 text-center">
                <div class="avatar-wrapper mt-5 mb-1">
                    <img class="profile-pic" id="profile-pic" :src="avater" />
                    <div class="upload-button"></div>
                    <input
                        class="file-upload"
                        type="file"
                        style="opacity: 0;width: 100%;height: 100px;position: absolute;left: 0;top: 0;"
                        accept="image/*"
                        @change="readUrl"
                        ref="avater"
                    />
                </div>
                <div class="text-center" v-if="displayUploadButton">
                    <a
                        href="javascript:void(0)"
                        class="btn-info btn-sm"
                        @click="uploadImage"
                        >Confirm Upload</a
                    >
                </div>
                <div class="text-center">
                    <span
                        class="text-capitalize mt-2 d-block mb-2 text-5"
                        v-text="fullname"
                    ></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6 is-empty">
                <label>First Name</label>
                <input
                    type="text"
                    class="form-control"
                    v-model="firstname"
                    @keyup.enter="update"
                />
                <small
                    :class="firstnameErrorClass"
                    v-text="firstnameError"
                ></small>
            </div>
            <div class="form-group col-md-6 is-empty">
                <label>Last Name</label>
                <input
                    type="text"
                    class="form-control"
                    v-model="lastname"
                    @keyup.enter="update"
                />
                <small
                    :class="lastnameErrorClass"
                    v-text="lastnameError"
                ></small>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6 is-empty">
                <label>Email</label>
                <input
                    type="email"
                    class="form-control"
                    v-model="email"
                    readonly
                />
            </div>
            <!-- <div class="form-group col-md-6 is-empty">
                <label>Phone Number</label>
                
            </div> -->
            <div class="col-auto col-md-6 is-empty">
                <label>Phone Number</label>
                <div class="input-group mb-2">
                    <!-- <input type="text" class="form-control" v-model="contact" @keyup.enter="update"> -->
                    <vue-tel-input
                        @country-changed="countryChanged"
                        v-model="contact"
                    ></vue-tel-input>
                    <small
                        :class="contactErrorClass"
                        v-text="contactError"
                    ></small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Country Name</label>
                <select class="form-control" v-model="country">
                    <option
                        v-for="country in countries"
                        :value="country.code"
                        :key="country.code"
                        v-text="country.name"
                    ></option>
                </select>
                <small :class="countryErrorClass" v-text="countryError"></small>
            </div>
            <div class="form-group col-md-6 is-empty">
                <label>City</label>
                <select class="form-control" v-model="city">
                    <option
                        v-for="city in cities"
                        :value="city.id"
                        :key="city.id"
                        v-text="city.name"
                    ></option>
                </select>
                <small :class="cityErrorClass" v-text="cityError"></small>
            </div>
            <!-- <div class="form-group col-md-6"> -->
            <!-- <label>State</label>
                <select v-model="state" class="form-control">
                    <option selected="">Choose...</option>
                    <option>...</option>
                </select> -->
            <!-- </div> -->
            <div class="form-group col-md-6 is-empty">
                <label>Zip</label>
                <input
                    type="text"
                    class="form-control"
                    v-model="zip"
                    @keyup.enter="update"
                    :pattern="zipRegex"
                />
                <small :class="zipErrorClass" v-text="zipError"></small>
            </div>
            <div class="form-group col-md-6">
                <label>Gender</label>
                <div>
                    <div
                        class="custom-control custom-radio custom-control-inline"
                    >
                        <input
                            type="radio"
                            id="male"
                            class="custom-control-input"
                            value="1"
                            v-model="gender"
                        />
                        <label class="custom-control-label" for="male"
                            >Male</label
                        >
                    </div>
                    <div
                        class="custom-control custom-radio custom-control-inline"
                    >
                        <input
                            type="radio"
                            id="female"
                            class="custom-control-input"
                            value="0"
                            v-model="gender"
                        />
                        <label class="custom-control-label" for="female"
                            >Female</label
                        >
                    </div>
                </div>
                <small :class="genderErrorClass" v-text="genderError"></small>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <div class="form-group is-empty">
                    <label>Address</label>
                    <textarea
                        class="form-control"
                        v-model="address"
                        rows="6"
                        @keyup.enter="update"
                    ></textarea>
                </div>
            </div>
        </div>

        <div class="bg-white text-center">
            <a
                href="#"
                type="submit"
                class="btn btn-dark btn-lg"
                @click="update"
                >Update</a
            >
        </div>
    </div>
</template>

<script>
import { VueTelInput } from "vue-tel-input";

export default {
    data() {
        return {
            firstname: "",
            lastname: "",
            email: "",
            contact: "",
            country: "",
            city: "",
            // state: '',
            zip: "",
            gender: 1,
            address: "",
            firstnameError: "",
            lastnameError: "",
            contactError: "",
            countryError: "",
            cityError: "",
            zipError: "",
            genderError: "",
            error: 0,

            countries: [],
            cities: [],
            zipRegex: "",
            contactPrefix: "",
            dialCode: "",

            avater: '',
            file: "",
            displayUploadButton: false
        };
    },
    components: { VueTelInput },
    computed: {
        fullname() {
            return InvestingPartner.auth.full_name;
        },
        firstnameErrorClass() {
            if (this.firstnameError.length > 0) {
                return "invalid-feedback invalid-feedback-show";
            }
            return "invalid-feedback";
        },
        lastnameErrorClass() {
            if (this.lastnameError.length > 0) {
                return "invalid-feedback invalid-feedback-show";
            }
            return "invalid-feedback";
        },
        contactErrorClass() {
            if (this.contactError.length > 0) {
                return "invalid-feedback invalid-feedback-show";
            }
            return "invalid-feedback";
        },
        countryErrorClass() {
            if (this.countryError.length > 0) {
                return "invalid-feedback invalid-feedback-show";
            }
            return "invalid-feedback";
        },
        cityErrorClass() {
            if (this.cityError.length > 0) {
                return "invalid-feedback invalid-feedback-show";
            }
            return "invalid-feedback";
        },
        zipErrorClass() {
            if (this.cityError.length > 0) {
                return "invalid-feedback invalid-feedback-show";
            }
            return "invalid-feedback";
        },
        genderErrorClass() {
            if (this.cityError.length > 0) {
                return "invalid-feedback invalid-feedback-show";
            }
            return "invalid-feedback";
        }
    },
    mounted() {
        this.fillExistingData();
        this.avater = InvestingPartner.auth.avater_path + '/' + InvestingPartner.auth.avater
    },
    created() {
        this.getCountries();
    },
    watch: {
        country(value) {
            if (this.countries.length > 0) {
                let index = this.countries.findIndex(country => {
                    return country.code === this.country;
                });
                this.zipRegex = this.countries[index].postal_code_regex;

                // this.contactPrefix = '+' + this.countries[index].phone.replace('+', '')

                this.getCities();
            }
        }
    },
    methods: {
        countryChanged(payload) {
            this.dialCode = payload.dialCode;
        },
        fillExistingData() {
            this.firstname = InvestingPartner.auth.first_name;
            this.lastname = InvestingPartner.auth.last_name;
            this.email = InvestingPartner.auth.email;
            if (InvestingPartner.auth.profile) {
                this.contact = InvestingPartner.auth.profile.contact || '';
                this.country = InvestingPartner.auth.profile.country_code;
                this.getCities();
                this.city = InvestingPartner.auth.profile.city_code;
                this.zip = InvestingPartner.auth.profile.zip;
                this.gender = InvestingPartner.auth.profile.sex;
                this.address = InvestingPartner.auth.profile.address;
            }
        },
        getCountries() {
            axios
                .post("/api/countries")
                .then(response => {
                    this.countries = response.data;

                    let index = this.countries.findIndex(country => {
                        return country.code === this.country;
                    });
                    this.zipRegex = this.countries[index].postal_code_regex;

                    // this.contactPrefix =
                    //     "+" + this.countries[index].phone.replace("+", "");
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getCities() {
            axios
                .post("/api/cities", { country_code: this.country })
                .then(response => {
                    this.cities = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        resetError() {
            this.firstnameError = "";
            this.lastnameError = "";
            this.contactError = "";
            this.countryError = "";
            this.cityError = "";
            this.zipError = "";
            this.genderError = "";
            this.contactError = "";
            this.error = 0;
        },
        validate() {
            if (this.firstname.length === 0) {
                this.firstnameError = "First name required";
                this.error++;
            }

            if (this.lastname.length === 0) {
                this.lastnameError = "Last name required";
                this.error++;
            }
        },
        update() {
            this.resetError();
            this.validate();
            
            if (this.error === 0) {
                let height = parseInt(document.getElementById("account-settings-profile").offsetHeight);
                let padding = (height - 40) / 2;
                let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`;
                document
                    .getElementById("account-settings-loading")
                    .setAttribute("style", loadingStyle);

                let data =  new FormData()
                if (this.$refs.avater.files[0] !== undefined) {
                    data.append('avater', this.$refs.avater.files[0])
                }
                
                data.append('first_name', this.firstname)
                data.append('last_name', this.lastname)
                data.append('contact', this.contact)
                data.append('country_code', this.country)
                data.append('city_code', this.city)
                data.append('zip', this.zip)
                data.append('sex', this.gender)
                data.append('address', this.address)
        
                let settings = { headers: { 'content-type': 'multipart/form-data' } }
                axios
                    .post("/api/member/update-profile", data, settings)
                    .then(response => {
                        if (response.status === 200) {
                            document
                                .getElementById("account-settings-loading")
                                .setAttribute("style", "display: none");
                            // alert('Profile update successful!')
                            this.flash("Profile update successful!", "success");
                            InvestingPartner.auth = response.data;
                            EventBus.$emit('change-avater', response.data.avater)
                            this.displayUploadButton = false
                            this.fillExistingData();
                        }
                    })
                    .catch(error => {
                        console.log(error);
                        document
                            .getElementById("account-settings-loading")
                            .setAttribute("style", "display: none");

                        if (error.response.status == 422) {
                            if (error.response.data.first_name) {
                                this.firstnameError =
                                    error.response.data.first_name[0];
                            }
                            if (error.response.data.last_name) {
                                this.lastnameError =
                                    error.response.data.last_name[0];
                            }
                            if (error.response.data.others) {
                                alert(error.response.data.others[0]);
                            }
                        }
                    });
            }
        },
        uploadImage() {
            this.file = this.$refs.avater.files[0]
            let data =  new FormData()
            data.append('avater', this.file)
       
            let settings = { headers: { 'content-type': 'multipart/form-data' } }
            axios.post('/api/member/avater-upload', data, settings)
                .then(response => {
                    if (response.status === 200) {
                        this.flash(response.data.message, response.data.type)
                        this.avater = InvestingPartner.app_url + '/storage/user/100x100-' + response.data.avater
                        InvestingPartner.auth.avater = response.data.avater
                        EventBus.$emit('change-avater', response.data.avater)
                        this.displayUploadButton = false
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        },
        readUrl() {
            var reader = new FileReader();
            reader.onload = () => {
                this.avater = reader.result;
                document.getElementById("profile-pic").src = this.avater;
                this.$nextTick(() => {
                    this.displayUploadButton = true;
                });
            };
            reader.readAsDataURL(this.$refs.avater.files[0]);
        }
    }
};
</script>

<style lang="scss" scoped>
.invalid-feedback.invalid-feedback-show {
    display: block;
}
.avatar-wrapper {
    position: relative;
    height: 100px;
    width: 100px;
    margin: 0px auto;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 1px 1px 15px -5px black;
    transition: all 0.3s ease;
}
.avatar-wrapper:hover {
    transform: scale(1.05);
    cursor: pointer;
}
.avatar-wrapper:hover .profile-pic {
    opacity: 0.5;
}
.avatar-wrapper .profile-pic {
    height: 100%;
    // width: 100%;
    transition: all 0.3s ease;
}
.avatar-wrapper .profile-pic:after {
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f007";
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    position: absolute;
    font-size: 75px;
    background: #ecf0f1;
    color: #34495e;
    text-align: center;
    line-height: 1.2;
}
.vue-tel-input {
    height: 40px;
    width: 100%;
    border-color: #e1e6eb !important;
}
</style>
