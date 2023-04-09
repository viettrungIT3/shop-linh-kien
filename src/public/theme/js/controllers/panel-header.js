import { Base } from "../base.js";

class PanelHeader extends Base{

    constructor(){super();}

    init(selector){

        if("undefined" === typeof selector || null === selector){
            selector = document.createElement("div");
            selector.classList.add("panel-header");
            selector.innerHTML = `<div class="panel-header-inner" data-type='js-container'></div>`;
        }

        this.set("el", selector);
        return this.prep();

    }


    prep(){

        let the_item = this.get("el"), 
            header = document.createElement("h3"), 
            el_sub_header = document.createElement("p");

        // init 
        el_sub_header.classList.add('sub-header');
        // append
        this.get_container().append(header);
        this.get_container().append(el_sub_header);

        // ref
        the_item.header = header;
        the_item.el_sub_header = el_sub_header;

        return this;

    }

    set_title(the_title){
        this.get("el").header.innerHTML = the_title;
        return this;
    }

    set_sub_title(value){ this.get("el").el_sub_header.innerHTML = value; return this; }

}


export {PanelHeader};
