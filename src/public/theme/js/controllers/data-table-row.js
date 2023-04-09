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
                case "phone":
                case "cell_phone":
                case "home_phone":
                case "phone_number":
                case "phone_number_called":
                    td.innerHTML = `${this.format_phone(the_data[s] || "")}`;
                    break;
                case "duration":
                    td.innerHTML = `${this.format_duration(the_data[s] || "")}`;
                    break;
                case "record_content":
                    td.innerHTML = `
                        <audio controls="controls" class="record" preload="none">
                            <source src="${the_data[s] || ""}">
                            <a href="${the_data[s]}">Unsupported Browsers &raquo; Download Audio</a>
                        </audio>
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
