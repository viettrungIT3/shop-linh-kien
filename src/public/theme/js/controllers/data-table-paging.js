import {Base} from "../base.js";
class DataTablePaging extends Base{


    constructor(){super();}

    init(selector){
        if("undefined" === typeof selector || null === selector) {
            selector = document.createElement("div");
            selector.classList.add("wrapper", "paging-wrapper");
            selector.innerHTML = `<div class="wrapper-inner" data-type='js-container'></div>`;
        }

        this.set("el", selector);
        return this.prep();
    }


    prep(){ return this; }

    set_data(total_records, limit){

        this.set("total", total_records);
        this.set("limit", limit);

        return this.do_clear(this.get_container(), this.display_pages.bind(this));
    }

    display_pages(){

        let total = this.get("total"), 
            limit = this.get("limit"), 
            current_page = this.get_current_page(),

            pages = Math.ceil(total / limit);
  
         

        this.set("pages", []);
    

          let left = (current_page - Math.floor(9 / 2))
          let right = (current_page + Math.floor(9 / 2))
          if (left < 1) {
            left = 1
            right = 9
          }

          if (right > pages) {
            left = pages - (9 - 1)
            
            if (left < 1){
                left = 1
            }
            right = pages
        }
        
        let page_number = [];
        for(let i = 0; i < pages; i++){

            page_number.push(i+1);
        }
 
        if(pages > 1){
            for(let i = left; i <= right; i++){
                this.add_page(i);
            }

            let paging_inner  = document.querySelector(".paging-wrapper .wrapper-inner");
            let previous = document.createElement("button");
            previous.classList.add ("previous");
            previous.innerHTML = `<span class="page-inner"><span class="fa fa-angle-double-left"></span></span>`;
            previous.addEventListener("click", this.handle_paging_link_click.bind(this, {the_page : Math.min(...page_number)}));
          
    
            let next = document.createElement("button");
            next.classList.add("next");
            next.innerHTML = `<span class="page-inner"><span class="fa fa-angle-double-right"></span></span>`;
            next.addEventListener("click", this.handle_paging_link_click.bind(this, {the_page:Math.max(...page_number)}));
         
            paging_inner.insertBefore(previous,paging_inner.firstElementChild);
            paging_inner.insertBefore(next,paging_inner.lastElementChild.nextSibling);
        }

        this.set_active(current_page);
        return this;

    }

    reset_paging(){

        this.set("total", 0);
        this.set("limit", 0);
        this.set("current_page", 1);
        this.set("pages", []);

        return this;

    } // reset paging

    clear_active(){
        let the_pages = this.get("pages");
        the_pages.forEach(s => s.setAttribute("data-status", ""));
        return this;
    }

    set_active(the_index){

        let the_pages = this.get("pages");
        this.clear_active();
        the_pages.forEach(s => s.page_index === the_index && s.setAttribute("data-status", "active"));
        return this;

    }


    add_page(i){

        let the_page = document.createElement("button"), 
            pages = this.get("pages") || [];  
        the_page.classList.add("single-page");
        the_page.innerHTML = `<span class='btn-text'>${i}</span>`;
        the_page.page_index = i; 
        the_page.addEventListener("click", this.handle_paging_link_click.bind(this, {the_page: the_page}));

        this.get_container().append(the_page);
        pages.push(the_page);

        return this;
    }


    handle_paging_link_click(the_data, the_event){
        the_event.preventDefault();
        this.set("current_page", the_data.the_page.page_index ||  the_data.the_page);
        this.set_active(the_data.the_page.page_index ||  the_data.the_page);
        this.run_hooks("page-changed", {the_page: the_data.the_page.page_index ||  the_data.the_page });
        return this.do_clear(this.get_container(), this.display_pages.bind(this));
    }


    get_current_page(){
        return this.get("current_page") || 1;
    }





} // class paging

export {DataTablePaging};