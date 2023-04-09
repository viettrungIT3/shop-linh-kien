import {Base} from "../base.js";


/*
 * @description: the controller is created to help dropdown select
 * box to load option asynchronously from a pre-set url 
 * it can auto-select option base on data-current-value
 *
 * */
class OptionPreloader extends Base{

    constructor(){
        super();
    }

    init(selector){

        if(null === selector) return null;

        this.set("el", selector);
        this.set_source_url(selector.dataset.sourceUrl);
        this.set_value(selector.dataset.currentValue);
        this.prep();

    } // init


    /*
     * @description: set the url where data are being fetched from
     * @param: string value
     * @return object
     * */
    set_source_url(value){
        this.set("source-url", value);
        return this;
    }


    /*
     * @description: set the current value for input
     * @param: mixed value
     * @return object
     * */
    set_value(value){
        this.set("current-value", value);
        this.get("el").value = value;
        return this;
    }

    /*
     * @description: reload the data after cleaning up all the options inside
     * @return this
     * */
    reload(){
        return this.do_clear(this.get("el"), () => this.fetch_data());
    } // reload


    prep(){

        let the_item = this.get("el");
        return this
                .init_worker()
                .fetch_data()
                .bind_events();
    
    } // prep function 


    /*
     * @description: to register for a worker for data fetching
     * @return this;
     * */
    init_worker(){

        let the_worker = new Worker(this.get_asset_url("js/worker.js"));
        return this
                    .set("worker_action", "option-preloader")
                    .set("worker", the_worker)
                    .bind_worker_events();

    }

    /*
     * @description: to bind worker event when worker is ready
     * @return this:w
     *
     * */
    bind_worker_events(){
        let the_worker = this.get("worker") ?? null, 
            w_action = this.get("worker_action");

        // if there is worker
        if(null === the_worker) return this;


        the_worker.addEventListener("message", (the_data) => {
            switch(the_data.data.w_action){
                case w_action:
                    switch(the_data.data.status ?? false){
                        case true: 
                            return this.done_fetching_data(the_data.data.data);
                            break;

                        default:
                            return this.failed_fetching_data(the_data.data.e);
                            break;
                    }
                    break;
            }
        });

        return this;

    } // bind worker event


    get name(){return this.get("el").name;}

    /*
     * @description: bind an event change to a global hook so that other component can access this single dropdown change  event
     * 1. add hooks to allow change url
     * @return object;
     * */
    bind_events(){
        let the_item = this.get("el");

        // tunnel event change to global hook option-changed
        the_item.addEventListener("change", 
                                    () => this.run_global_hooks(
                                        `${the_item.name}-option-changed`, 
                                        {
                                            name: this.get("el").name,
                                            option: this.get_data()
                                        }
                                    ));

        // allow other component to request a change url to this com
        this.add_global_hooks(`${the_item.name}-request-url-change`, (e) => {
            return this.set_source_url(e.url);
        });

        // allow to set the value from any component
        this.add_global_hooks(`${the_item.name}-request-value-change`, (e) => {

            this.set_value(e.value);
            
            return this;

        });

        // allow to request to enable input
        this.add_global_hooks(`${the_item.name}-request-to-disable`, (e) => {
            this.get("el").setAttribute("data-manual", 1);
            return this.get("el").setAttribute('disabled', 'disabled');
        });

        // allow to request to disable input
        this.add_global_hooks(`${the_item.name}-request-to-enable`, (e) => {
            this.get("el").removeAttribute("data-manual", 1);
            return this.get("el").removeAttribute('disabled');
        });


        // allow other component to request to reload the comp
        this.add_global_hooks(`${the_item.name}-request-reload`, (e) => {
            return this.reload();
        });


        return this.extend_prep();
    }

    extend_prep(){
        return this;
    }


    /*
     * @description: return the selected object, not just the index
     * but the full object sent from fetched
     * @return object;
     * */
    get_data(){
        let the_item = this.get("el"), 
            the_data = this.get("data") || null, 
            value = the_item.value, 
            selected = null, 
            data_key = the_item.dataset.idKey || "id";

        if(null == the_data) return null;

        the_data.forEach(s => {
            if(s[data_key] === value || parseInt(s[data_key]) === parseInt(value)){
                selected = s;
            }
        });
        return selected;
    }

    /*
     * @description: return true if it's tagged to cache
     * @return boolean;
     * */
    cache(){ return parseInt(this.get("el").dataset.cache ?? "-1") === 1; }

    /*
     * @description: go through each data entry from fetched data
     * and add each single on into select dropdown
     * After that set the curent value to be selected if available
     * @return this;
     * */
    do_display(){


        let the_item = this.get("el"), 
            the_data = this.get("data");

        this.add_empty_option();

        the_data.forEach(s => this.add_single_option(s));

        the_item.value = this.get("current-value") ?? "";
        // the_item.disabled = false;
        if(null === (the_item.dataset.manual || null)) the_item.disabled = false;
        
        return this;

    } // done display function


    /*
     * @description: disable the field  and show an empty option where 
     * it said that no options
     * @return this;
     * */
    show_no_data(){
        return this.do_clear(this.get("el"), () => {
            this.add_empty_option("No options available.");
            this.get("el").disabled = true;
            return this;
        });
    }


    /*
     * @description: add an empty option
     * @return this;
     * */
    add_empty_option(the_text = "Please choose ..."){

        let the_item = this.get("el"), 
            the_option = document.createElement("option");

        the_option.value = "";
        the_option.innerHTML = the_text;

        the_item.append(the_option);

        return this;

    }// add single option

    /*
     * @description: add a single option into the select box
     * @param: object s
     * @return this;
     * */
    add_single_option(s){

        let the_item = this.get("el"), 
            the_option = document.createElement("option"), 
            data_key = the_item.dataset.idKey || "id", 
            data_value_key = the_item.dataset.valueKey || "value";

        the_option.value = s[data_key];
        the_option.innerHTML = s[data_value_key];

        the_item.append(the_option);

        return this;

    }// add single option


    /*
     * @description: load data from source_url and call back
     * when done or failed with data or error
     * @return this;
     * */
    fetch_data(){

        let the_item = this.get("el"), 
            existing_data = null, 
            source_url = this.get("source-url"), 
            the_worker = this.get("worker") ?? null; 
        
        //empty source then do nothing
        if(source_url === "") return this.show_no_data();

        if(this.cache()) existing_data = this.get_from_storage(source_url);

        if(null !== existing_data){
            this.set("data", JSON.parse(existing_data));
            return this.do_display();
        }
        
        // show spinning indicator
        this.do_waiting(the_item);


        // if there is worker, let worker work
        if(null !== the_worker){
            the_worker.postMessage(
                {
                    w_action: this.get("worker_action"), 
                    url: source_url,
                    body: null,
                    method: "GET"
                }
            )
            return this;
        }

        fetch(source_url)
            .then(res => res.json())
            .then(the_data => this.done_fetching_data(the_data))
            .catch(error => this.failed_fetching_data(error));

        return this;
    }

    /*
     * @description: check if status is true and then start to display 
     * data via method do_display() or send the error back to method
     * failed_fetching_data when done or failed with data or error
     * @return this;
     * */
    done_fetching_data(the_data){

        if("undefined" === typeof the_data.status || !the_data.status){
            return this.failed_fetching_data(the_data.error);
        }

        let the_item = this.get("el");

        this.done_waiting(the_item);
        this.set("data", the_data.data);

        if(the_data.data.length === 0) return this.done_waiting().show_no_data();
        
        // save to storage if this is to cache
        if(this.cache()){ this.save_to_storage(this.get("source-url"), JSON.stringify(the_data.data)); }

        return this.done_waiting().do_clear(this.get("el"), this.do_display.bind(this));

    } // done loading data


    /*
     * @description: remove waitingg indicator, display error message
     * and show_no_data
     * @return this;
     * */
    failed_fetching_data(err){
        // console.log(err);
        this.run_global_hooks(`${this.get('el').name}-request-failed-fetching-data`);
        return this
                    .done_waiting(this.get("el"))
                    .run_hooks("failed_fetching_data")
                    .show_no_data();
        
    } // failed loading data
    
}

export {OptionPreloader};
