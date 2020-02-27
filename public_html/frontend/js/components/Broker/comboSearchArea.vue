<template>
    <div>
        <div class="drop-shadow listing-box bg-white mb-1">
            <div class="form-row">
                <div class="col-md-12">
                    <slot name="input">
                        <div v-if="inputType==='select'" class="form-group position-relative change-icon downs">
                            <select class="form-control" name="" id="" @change="change(parameter.key)">
                                <option>-- Select a Country --</option>
                                <option :value="parameter.key" v-for="parameter in searchParameter" :key="parameter.key">{{ parameter.label }}</option>
                            </select>
                        </div>

                        <div v-if="inputType==='text'" class="form-group position-relative change-icon">
                            <input type="text" class="form-control" :placeholder="paramKey.replace('_', ' ')" v-model="input" @focus="focused = true">
                            <ul v-show="focused && searchSuggesation.length > 0" class="search-suggesation position-absolute">
                                <li v-for="suggesation in searchSuggesation" :key="suggesation.slug" @click="updateSearchParameter(suggesation.slug)">
                                    <span v-if="isFlaged" class="flag-icon" :class="`flag-icon-${suggesation.key.toLowerCase()}`"> </span> {{ suggesation.label }}
                                </li>
                            </ul>
                        </div>
                    </slot>
                </div>
                <div class="col-md-12">
                    <transition-group name="fade">
                        <div class="form-check" v-for="parameter in quickDisplayParameter" :key="parameter.key">
                            <input class="form-check-input" type="checkbox" @change="change(parameter.key)" :checked="parameter.checked" :value="parameter.slug" :name="parameter.slug" :id="parameter.slug">
                            <label :for="parameter.slug" class="form-check-label"><span v-if="isFlaged" class="flag-icon" :class="`flag-icon-${parameter.key.toLowerCase()}`"></span> {{ parameter.label }}</label>
                        </div>
                    </transition-group>
                    <span class="badge badge-info pointer" @click="viewLess = false" v-if="viewLess">Load More</span>
                    <span class="badge badge-danger pointer" v-else @click="viewLess = true">Collapse</span>
                    <span class="badge badge-warning pointer reset-btn" v-if="resetable" @click="reset">Reset</span>
                </div>
            </div>            
        </div>
    </div>
</template>

<script>
import { randomBytes } from 'crypto';
export default {
    props: {
        paramKey: {
            type: String,
            required: true
        },
        paramSourceEndpoint: {
            type: String,
            required: true
        },
        isFlaged: {
            type: Boolean,
            default: false
        },
        inputType: {
            type: String,
            default: 'text'
        }
    },
    data() {
        return {
            searchParameter: [],
            viewLess: true,
            uriParamaterValue: [],
            input: '',
            searchSuggesation: [],
            focused: false,
            // resetable: false
        }
    },
    watch: {
        input (value) {
            this.searchSuggesation = []

            if (value.length > 0) {
                this.searchSuggesation = this.searchParameter.filter(param => {
                    if (param.label.toLowerCase().indexOf(value) !== -1) {
                        return param
                    }
                })
            }
        }
    },
    created() {
        
        axios.get(this.paramSourceEndpoint)
            .then(response => {
                if(response.status === 200) {
                    
                    let parameter = this.getUrlParam(this.paramKey)
                    if (parameter) {
                        parameter = parameter.split(',')
                        
                        response.data.map(param => {
                            if (parameter.indexOf(param.slug) !== -1) {
                                param.checked = true
                                return param
                            }
                        })
                    }

                    this.searchParameter = response.data
                }
            })
            .catch(error => {
                console.log(error)
            })
    },
    computed: {
        quickDisplayParameter() {
            if (this.viewLess) {
                return this.searchParameter.filter(parameter => parameter.quickDisplay || parameter.checked )
            }
            return this.searchParameter
        },
        resetable () {
            var resetable = false
            for (var p = 0; p <= this.searchParameter.length - 1; p++) {
                if (this.searchParameter[p].checked && this.searchParameter[p].checked === true) {
                    resetable = true
                    break
                }
            }
            if (resetable) {
                EventBus.$emit('displayGrandReset')
            }
            
            return resetable
        }
    },
    mounted () {
        EventBus.$on('reset', () => {
            // console.log('listen')
            this.reset()
        })
    },
    methods: {
        reset () {
            let clonedSearchParameter = this.searchParameter.slice()
            let muted = false;
            clonedSearchParameter.map(parameter => {
                if (parameter.checked && parameter.checked === true) {
                    parameter.checked = false
                    muted = true
                }
            })
            this.searchParameter = clonedSearchParameter
            
            if (muted) {
                this.updateUrl()
            }
            
        },
        change (key) {
            var params = this.searchParameter.slice();
            let index = params.findIndex(parameter => {
                return parameter.key === key
            })
            params[index].checked = !params[index].checked
            this.searchParameter = params

            this.updateUrl()
        },
        updateUrl () {
            let parameters = this.searchParameter.filter(param => {
                if (param.checked) return true
            }).map(param => {
                return param.slug
            })
            parameters.length > 0 ? this.changeUrlParam(this.paramKey, parameters) : this.removeUrlParam(this.paramKey)

            this.$emit('search')
        },
        updateSearchParameter (slug) {
            
            this.searchParameter = this.searchParameter.map(param => {
               
                if (slug === param.slug) {
                    param.checked = true
                }
                return param
            })
            this.input = ''
            this.focused = false

            this.updateUrl()
        }
    }
}
</script>

<style lang="scss" scoped>
    .pointer {
        cursor: pointer
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
    .reset-btn {
        float:right;
        margin-top:5px;
    }

    .search-suggesation {
        list-style: none;
        padding: 0;
        z-index: 1;
        background: white;
        width: 100%;
        top: 38px;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
        border-bottom: 1px solid #c4c4c4;
        border-left: 1px solid #c4c4c4;
        border-right: 1px solid #c4c4c4;
    }

    .search-suggesation > li {
        padding: 3px 8px;
        cursor: pointer;

        &:hover {
            background: #00bcd4;
            color: white;
        }
    }

    .position-relative {
        position:relative
    }

    .position-absolute {
        position: absolute;
    }
</style>
