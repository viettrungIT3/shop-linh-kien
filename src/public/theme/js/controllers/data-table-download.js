import { Base } from "../base.js";

class DataTableDownload extends Base{

    constructor(){ super(); }

    init(selector){

        if("undefined" === typeof selector || null === selector){
            selector = document.createElement("div");
            selector.classList.add("wrapper", "controls-wrapper");
            selector.innerHTML = `<div class="wrapper-inner" data-type='js-container'></div>`;
        }// 

        this.set("el", selector);

        return this.prep();
        
    } // 

    prep(){

        let the_item = this.get("el"), 
            btn_download = document.createElement("button");

        btn_download.classList.add("btn", "btn-primary");
        btn_download.innerHTML = `<span class="fa fa-download"></span> <span class="btn-text">Download Results</span>`;
        btn_download.addEventListener("click", this.handle_btn_download_click.bind(this, {the_button: btn_download}));

        this.get_container().append(btn_download);

        the_item.btn_download = btn_download;

        return this.bind_events();

    } // end of prep

    handle_btn_download_click(the_data, the_event){

        the_event.preventDefault();

        this.run_hooks("request-download");

        return this;

    }

    deactivate(){
        this.get("el").setAttribute("data-status", this.helpers.statuses.inactive);
        return this;
    }

    activate(){
        this.get("el").setAttribute("data-status", this.helpers.statuses.active);
        return this;
    }

    bind_events(){

        return this;
    }


} //

export {DataTableDownload};
