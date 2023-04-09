import {Base} from "../base.js";

class DownloadCSV extends Base{

    constructor(){
        super();
    }

    init(selector){

        if(null === selector) return null;

        this.set("el", selector);
        this.prep();

    } // init

    prep(){
        let the_item = this.get("el");

        if("undefined" === typeof the_item.dataset.url){
            console.log("Download button - URL is missing");
            return null;
        }

        if("undefined" === typeof the_item.dataset.filename){
            console.log("Download button - Filename is missing");
            return null;
        }

        the_item.url = the_item.dataset.url;
        the_item.filename = the_item.dataset.filename;

        the_item.addEventListener("click", () => {
            this.fetch_data();
        });

        return this;
    
    } // prep function 

    // custom waiting function 
    do_waiting(){
        this.get("el").setAttribute("data-status", this.helpers.statuses.waiting);
        return this;
    };
    
    done_waiting(){
        this.get("el").setAttribute("data-status", this.helpers.statuses.done_waiting);
        return this;
    }

    fetch_data(){
        let the_item = this.get("el");

        this.do_waiting();

        fetch(the_item.url)
            .then(res => res.json())
            .then(the_data => this.done_fetching_data(the_data))
            .catch(error => this.failed_fetching_data(error));

        return this;
    }

    done_fetching_data(the_data){
        
        if("undefined" === typeof the_data.status || !the_data.status){
            return this.failed_fetching_data(the_data.error);
        }

        this.run_hooks("done_fetching_data");
        this.set("data", the_data.data);


        return this.done_waiting()
        .download_csv_file(null, this.json_to_csv(the_data.data), this.get("el").filename);

    } // done loading data

    failed_fetching_data(err){

        console.log(err);
        this.run_hooks("failed_fetching_data");
        
        return this.done_waiting();
        
    } // failed loading data

}

export {DownloadCSV};
