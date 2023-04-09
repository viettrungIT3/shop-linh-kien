import { Base } from "../base.js";

class DataTableHeader extends Base{

    constructor(){super();}
    init(selector = null, the_data = null) {
        if("undefined" === typeof selector  || null === selector){
            selector = document.createElement("thead");
            selector.innerHTML = "<tr data-type='js-container'></tr>";
        }

        this.set("el", selector);
        if("undefined" !== typeof the_data && null !== the_data) {

            this.fix_keys_mapping(the_data);
        }
        return this.prep();
    }
    
    fix_keys_mapping(the_data){
        let data_keys = Object.keys(the_data[0]);
        for(let s in keys_mapping){
            if(-1 === data_keys.indexOf(s)) delete keys_mapping[s];
        }
        return this;
    } // 
    
    prep(){ return this.render(); }


    render(){
        
        Object.keys(keys_mapping).forEach(k => this.add_header_by_key(k));

        return this;
    }

    add_header_by_key(the_key){

        let the_label = keys_mapping[the_key], 
            _sort = null, 
            _header = document.createElement("th"), 
            _sorting_headers = this.get("sorting_headers") ?? {};

        if("undefined" !== typeof sort_mapping && "undefined" !== typeof sort_mapping[the_key]){

            _sort = document.createElement("a");
            _sort.key = the_key;
            _sort.setAttribute("href", "#");
            _sort.setAttribute("data-sort", sort_mapping[the_key]);
            _sort.setAttribute("data-dir", "asc");

            _sort.innerHTML = `<span class="label-text">${the_label}</span> <span class="icon"><em class="fa fa-chevron-down"></em></span>`;

            _header.append(_sort);

            _sort.addEventListener("click", this.handle_sort_click.bind(this, {the_sort: _sort}));
            _sorting_headers[`sort-${the_key}`] = _sort;

            this.set("sorting_headers",_sorting_headers);

        }else{
            _header.innerHTML = the_label;
        }
        
        this.get_container().append(_header);

        return this;

    } // done adding header

    reset_sorting_icons(exclude){

        let sorting_headers = this.get("sorting_headers");

        if(null === sorting_headers || Object.keys(sorting_headers).length === 0) return this;
        Object.keys(sorting_headers).forEach(s => {
            if("undefined" !== typeof exclude && sorting_headers[s].key === exclude) return false;
            sorting_headers[s].setAttribute("data-dir", "asc");
        });

        return this;

    } // resetting the sorting icons

    handle_sort_click(the_data, the_event){

        the_event.preventDefault();
        this.reset_sorting_icons(the_data.the_sort.key);
        switch(the_data.the_sort.dataset.dir){
            case "asc":
                the_data.the_sort.setAttribute("data-dir", "desc");
                break;
            default:
                the_data.the_sort.setAttribute("data-dir", "asc");
        }
        this.run_hooks("request-sort", {sort: the_data.the_sort.dataset.sort, dir: the_data.the_sort.dataset.dir});
        return this;
    }

} //

export {DataTableHeader};
