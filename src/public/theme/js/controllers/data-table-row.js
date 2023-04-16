import {Base} from "../base.js";

class DataTableRow extends Base{

    constructor(){super();}
    init(selector){

        if("undefined" === typeof selector || null === selector ){
            selector = document.createElement("tr");
        }

        this.set("el", selector);
        return this.prep();
    } 

    prep(){

        return this;
    }


    set_empty_row(){

        let td = document.createElement("td");
        td.setAttribute("colspan", "100%");
        td.style.textAlign = "center";
        td.innerHTML = "No records were found.";
        this.get_container().append(td);
        return this;

    }// empty row

    set_data(the_data){

        Object.keys(keys_mapping).forEach(s => {
            let td = document.createElement("td");
            switch(s){
                case "order_number":
                    td.innerHTML = `
                        <a href="https://greenwellfarms-dev2.myshopify.com/admin/orders/${the_data[s]}" class="link_to_order" target="_blank">${the_data[s]}</a>
                    `;
                break;
                default: 
                    td.innerHTML = `${the_data[s] || ""}`;
            }
            this.get_container().append(td);
        });

        return this;
    }


    set_link(the_link){

        if("undefined" === typeof the_link || null === the_link ) return this;
        let the_item = this.get("el");
        the_item.setAttribute("data-link", the_link);
        the_item.addEventListener("click", () => window.location=the_link);
        return this;

    }

} // 


export {DataTableRow};
