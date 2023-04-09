import {Base} from "../base.js";

class SubmitButton extends Base {

    constructor(){
        super();
    }

    init(){

        this.prep();

    } // init

    prep(){

        this.submitFunction();
        this.submitClear();

        return this;
    
    } // prep function 

    submitFunction(){
        let the_item = document.getElementsByClassName("btn-submit-get-form");
        let _input = document.querySelectorAll("input[type=text], input[type=number], input[type=tel], select");

        for(let i = 0; i < the_item.length; i++) {
        (function(index) {
            the_item[index].addEventListener("click", function() {
                let self = this,
                        current_params = window.location.search.replace(/^\?/, '').split("&") || "",
                        params = {},
                        the_url = [],
                        _t = null,
                        _e_val = "",
                        _e_name;

                    if (current_params.length > 0) {
                        for (let i = 0; i < current_params.length; i++) {
                            _t = current_params[i].split("=");
                            if ("undefined" !== typeof _t[0] &&
                                "undefined" !== typeof _t[1]) {
                                params[_t[0]] = _t[1];
                            }
                        }
                    }

                    // adding more params from the form
                    _input.forEach(function (_f_index, _f_el) {
                        _e_val = _f_index.value;
                        _e_name = _f_index.getAttribute("name");

                        if (null !== _e_val && _e_val.length > 0) {
                            params[_e_name] = _e_val;
                        } else {
                            if ("undefined" !== typeof params[_e_name]) {
                                delete(params[_e_name]);
                            }
                        }

                    }); //


                    for (let _key in params) {
                        the_url.push(_key + "=" + params[_key]);
                    }

                    window.location = window.location.pathname +
                        (the_url.length > 0 ? "?" + the_url.join("&") : "");
            })
        })(i);
        }
        
        return this;
    }

    submitClear(){

        let the_item = document.getElementsByClassName("btn-clear-get-form");

        for(let i = 0; i < the_item.length; i++) {
        (function(index) {
            the_item[index].addEventListener("click", function(event) {
                event.preventDefault();
                window.location = window.location.pathname;
            })
        })(i);
        }

        return this;
    }
}

export {SubmitButton};