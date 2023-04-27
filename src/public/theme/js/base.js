import {Helpers} from './helpers.js';
import {Notification} from './controllers/notification.js';

class Base{

    constructor(){
        this.hooks = {};
        this.params = {};
        this.helpers = Helpers;
        if("undefined" === typeof window.notification){
            window.notification = new Notification();
            window.notification.init();
        }
    }

    get_data(){return this.params;}
    get_dom(){return this.get("el");}

    get_breakpoints(){ return Helpers.break_points;}

    get_breakpoints(){ return Helpers.break_points;}

    rm(_key){
        if("undefined" === typeof this.params[_key]) return null;
        delete this.params[_key];
        return this;
    }

    set(_key, _value){this.params[_key] = _value; return this;}

    get(_key){
        if("undefined" === typeof this.params[_key]) return null;
        return this.params[_key];
    }

    get_from_storage(key){
        this.check_storage_version();
        let the_data = localStorage.getItem(this.generate_storage_key(key));
        return the_data;
    }

    save_to_storage(key, value){

        this.check_storage_version();
        localStorage.setItem(this.generate_storage_key(key), value);
        return this;
    }

    generate_storage_key(key , version){
        if("undefined" === typeof version || null === version){
            version = window.__constants.app_version + window.__constants.assets_version;
        }
        return `${version}-${this.helpers.data_keys.prefix}-` + (("undefined" !== typeof key && null !== key && key.length > 0) ? btoa(key): ""); 
    }

    check_storage_version(){

        let current_version = localStorage.getItem(this.helpers.data_keys.version), 
            new_version = window.__constants.app_version + window.__constants.assets_version;

        if(current_version !== new_version){
            // clear older versions
            this.clear_storage();
        }

        localStorage.setItem(this.helpers.data_keys.version, new_version);

        return this;
    }


    clear_storage(){

        let current_version = localStorage.getItem(this.helpers.data_keys.version);

        if(null === current_version) return this;

        Object.keys(localStorage).forEach(s => {

            let the_key = this.generate_storage_key("", current_version);

            console.log("checking storage key ", s, the_key);

            if(s.indexOf(the_key) > -1){ localStorage.removeItem(s); }
        });

        return this;
    }

    
    add_hooks(_key, _func){

        if("function" !== typeof _func) return this;
        if("undefined" === typeof this.hooks[_key]) this.hooks[_key] = [];
        this.hooks[_key].push(_func);
        return this;

    }// end of function add hooks

    run_hooks(_key, _the_data = null){
        if("undefined" === typeof this.hooks[_key]) return this;
        if(this.hooks[_key].length === 0) return this;

        this.hooks[_key].forEach((_single_function) => {
            if("function" === typeof _single_function) {
                _single_function(_the_data);
            }
        });

        return this;

    } // end of running hooks


    add_global_hooks(_key, _func){

        if("function" !== typeof _func) return this;
        if("undefined" === typeof window._global_hooks) window._global_hooks = {};
        if("undefined" === typeof window._global_hooks[_key]) window._global_hooks[_key] = [];
        window._global_hooks[_key].push(_func);
        return this;

    }// end of function add hooks

    run_global_hooks(_key, _the_data = null){
        if("undefined" === typeof window._global_hooks[_key]) return this;
        if(window._global_hooks[_key].length === 0) return this;

        window._global_hooks[_key].forEach((_single_function) => {
            if("function" === typeof _single_function) {
                _single_function(_the_data);
            }
        });

        return this;
    } // end of running hooks


    success(message){
        let the_message = Array.isArray(message) ? message.join(". ") : message;
        if("undefined" !== typeof window.notification){
            window.notification.success(the_message).show().hide(7000); 
        }
        return this;
    }

    failed(message){
        
        let the_message = Array.isArray(message) ? message.join(". ") : message;
        if("undefined" !== typeof window.notification){
            window.notification.error(the_message).show().hide(7000); 
        }

        return this;
    }

    do_waiting(the_container = null){
        if(null === the_container){
            document.body.setAttribute("data-status", Helpers.statuses.waiting);
        }else{

            if("undefined"  === typeof the_container.dataset.statusReady || null === the_container.dataset.statusReady){
                this.prep_container_for_status_ready(the_container);
            }
            the_container.setAttribute("data-status", Helpers.statuses.waiting);
        }
        return this;
    } // do waiting

    done_waiting(the_container = null){
        if(null === the_container){
            document.body.setAttribute("data-status", Helpers.statuses.done_waiting);
        }else{
            if("undefined"  === typeof the_container.dataset.statusReady || null === the_container.dataset.statusReady){
                this.prep_container_for_status_ready(the_container);
            }
            the_container.setAttribute("data-status", Helpers.statuses.done_waiting);

        }
        return this;
    } // done waiting
    
    do_clear(the_container, __callback){

        if("undefined" === typeof the_container || null === the_container) return this;

        if(the_container.childNodes.length > 0){
            the_container.childNodes[0].remove();
            return this.do_clear(the_container, __callback);
        }
       
        if("function" === typeof __callback){
            __callback();
        }

        return this;
    } // end of clearing 



    reset_form(the_form = null){
        if("undefined" === typeof the_form || null === the_form){
            the_form = this.get_container();
        }

        var the_inputs = the_form.querySelectorAll("input,select,textarea");

        if(the_inputs.length > 0){
            the_inputs.forEach((input) =>  {

                switch(input.type){
                    case "hidden":break;
                    default: 
                        input.value = input.dataset.currentValue || "";
                }
            });
        }

        return this;

    } // 

    /*
         * @description: to validate the form the html5 way. The function only check the validity
         * and will look for parent to assign a class name to indicate if it passed or failed
         * css will have to be implement for visual effect
         * @param: HTMLElement the_form
         * @return this
         * */
    validate(the_form = null, do_prompt = true){

        if(null === the_form) the_form = this.get("el");

        var
            the_inputs = the_form.querySelectorAll("[required]"),
            has_error = false,
            input_wrapper = null;
        the_inputs.forEach((input) => {

            input_wrapper = the_form.querySelector("#df_" + input.name);

            if(!input.checkValidity()){
                if(null !== input_wrapper){
                    input_wrapper.classList.add(Helpers.classes.has_error);
                }
                has_error = true;
            }else{
                if(null !== input_wrapper){
                    input_wrapper.classList.remove(Helpers.classes.has_error);
                }
            }

        });

        the_form.setAttribute("data-validated", 1);

        if(has_error && do_prompt){
            this.failed("Some fields still need your intention");
        }

        return !has_error;

    } // end of fun


    collect_data(the_form = null) {

        if("undefined" === typeof the_form || null === the_form) the_form = this.get("el");
        var
            the_inputs = the_form.querySelectorAll("input,select,textarea"), 
            the_data = {};


        if(the_inputs.length > 0){
            the_inputs.forEach((input) => {
                if(input.name.length > 0){
                    switch(input.tagName){
                        case "SELECT":
                        case "TEXTAREA":
                            the_data[input.name] = input.value;
                            break;
                        case "INPUT":
                            switch(input.type.toLowerCase()){
                                case "checkbox": /// will need to check if []
                                case "radio":
                                    if(input.checked){
                                        the_data[input.name] = input.value;
                                    }
                                    break;

                                case "text":
                                case "search":
                                case "email":
                                case "hidden":
                                case "tel":
                                case "number":
                                case "password":
                                    the_data[input.name] = input.value.trim();
                                    break;
                            }//
                        break;
                    }
                }

            });

        } //
    
        return the_data;

    }// end of function to collect data


    get_container(target = null, key = null){

        if("undefined" === typeof target  || null === target) target = this.get("el");

        if(null === key) key = "js-container";
        var container = target.querySelector(`.${key},[data-type='${key}']`);

        if(null === container) return target;
        return container;

    } // end of function get container




    prep_container_for_status_ready(the_container){

        var status_overlay = document.createElement("div");
        status_overlay.classList.add("status-overlay-wrapper");
        status_overlay.innerHTML = `
            <div class='status-overlay-inner'>
                <div class='s-content'>
                    <div class='s-content-inner'>
                        <span class='fa fa-spinner fa-spin'></span>
                    </div>
                </div>
            </div>
        `;
        the_container.append(status_overlay);
        the_container.setAttribute("data-status-ready", "1");
        the_container.classList.add("status-overlay");

        return this;

    } // 

    json_to_csv(obj, opt) {

        if (typeof obj !== 'object') return null;
        opt = opt || {};
        var scopechar = opt.scopechar || '/';
        var delimeter = opt.delimeter || ',';
        if (Array.isArray(obj) === false) obj = [obj];
        var curs, name, rownum, key, queue, values = [], rows = [], headers = {}, headersArr = [];
        for (rownum = 0; rownum < obj.length; rownum++) {
            queue = [obj[rownum], ''];
            rows[rownum] = {};
            while (queue.length > 0) {
                name = queue.pop();
                curs = queue.pop();
                if (curs !== null && typeof curs === 'object') {
                    for (key in curs) {
                        if (curs.hasOwnProperty(key)) {
                            queue.push(curs[key]);
                            queue.push(name + (name ? scopechar : '') + key);
                        }
                    }
                } else {
                    if (headers[name] === undefined) headers[name] = true;
                    rows[rownum][name] = curs;
                }
            }
            values[rownum] = [];
        }
        // create csv text
        for (key in headers) {
            if (headers.hasOwnProperty(key)) {
                headersArr.push(key);
                for (rownum = 0; rownum < obj.length; rownum++) {
                    values[rownum].push(rows[rownum][key] === undefined ? '' : JSON.stringify(rows[rownum][key]));
                }
            }
        }
        for (rownum = 0; rownum < obj.length; rownum++) {
            values[rownum] = values[rownum].join(delimeter);
        }
        return '"' + headersArr.join('"' + delimeter + '"') + '"\n' + values.join('\n');
    }

    download_csv_file(headers, csv, filename){
        if (headers) {
            items.unshift(headers);
        }

        var the_name = filename + '.csv' || 'export.csv';

        var blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        if (navigator.msSaveBlob) { // IE 10+
            navigator.msSaveBlob(blob, the_name);
        } else {
            var link = document.createElement("a");
            if (link.download !== undefined) { // feature detection
                // Browsers that support HTML5 download attribute
                var url = URL.createObjectURL(blob);
                link.setAttribute("href", url);
                link.setAttribute("download", the_name);
                link.style.visibility = 'hidden';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }

    } // download csv

    download_file(content, filename, content_type){

        var the_name = filename || 'download';

        var blob = new Blob([content], { type: content_type});

        if (navigator.msSaveBlob) { // IE 10+
            navigator.msSaveBlob(blob, the_name);
        } else {
            var link = document.createElement("a");
            if (link.download !== undefined) { // feature detection
                // Browsers that support HTML5 download attribute
                var url = URL.createObjectURL(blob);
                link.setAttribute("href", url);
                link.setAttribute("download", the_name);
                link.style.visibility = 'hidden';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        }

    } // download csv

    format(str, ...params){
        if(null !== params  && params.length > 0){
            params.forEach((s,index) => {
                str = str.replace(`{${index}}`, s);
            })
        }
        return str;
    }

    /*
     * @description: to convert js relative path to uri
     * @param: string path
     * @return string
     * */
    get_asset_url(path){
        if(/^https*/.test(path)) return path;
        return `${__constants.assets_url}${path}?v=${__constants.app_version}_${__constants.assets_version}`;
    }

}


export{Base};
