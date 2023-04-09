import {Base} from "../base.js";

class DataTableFilter extends Base{

    constructor(){super();}

    init(selector){

        if("undefined" === typeof selector || selector === null) return this;

        this.set("el", selector);

        return this.prep();

    } // init

    prep(){

        let the_item = this.get("el");

        the_item.btn_reset = the_item.querySelector("[data-type='btn-clear']");
        the_item.btn_submit = the_item.querySelector("[data-type='btn-submit']");
	
        return this.bind_events();

    } // prep function


    bind_events(){

        let the_item = this.get("el");
        if(null !== the_item.btn_reset){
            the_item.btn_reset.addEventListener("click", this.handle_btn_reset_click.bind(this, {}));
        }
        if(null !== the_item.btn_submit){
            the_item.btn_submit.addEventListener("click", this.handle_btn_submit_click.bind(this, {}));
        }

        return this;

    } // bind events


    handle_btn_reset_click(the_data, the_event){

        this.reset_form();
        the_event.preventDefault();
        this.run_hooks("filters-changed", {data: this.collect_data()});

        return this;

    } // 

    handle_btn_submit_click(the_data, the_event){

        the_event.preventDefault();
        this.run_hooks("filters-changed", {data: this.collect_data()});
        return this;

    }

    do_filter(){

        this.run_hooks("filters-changed", {data: this.collect_data()});
        return this;
    }


}


export {DataTableFilter};
