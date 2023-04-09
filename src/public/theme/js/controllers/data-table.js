import { Base } from "../base.js";
import { PanelHeader } from "../controllers/panel-header.js";
import { DataTableFilter } from "../controllers/data-table-filter.js";
import { DataTableHeader } from "../controllers/data-table-header.js";
import { DataTableRow } from "../controllers/data-table-row.js";
import { DataTablePaging } from "../controllers/data-table-paging.js";
import { DataTableDownload } from "../controllers/data-table-download.js";


/*
 * @description: general module to display table into a table which 
 * will support filtering, sorting, and paging
 * keys_map: {}, and sort_mapping= {} will need to be defined for 
 * displaying data with the correct header such as 
 * keys_map = {
 *  "${real_data_field_name}": "${field_to_display_on_table_header}", 
 *  "name": "Name", 
 *  "status_text": "Enrollment Status ", 
 *  "agent_name": "Agent Name"
 *   ...
 * };
 * Sort Mapping object will carry pair key value base on the following order: 
 * data field name: data sort value (which  will be passed into payload) 
 * when data_field_name is clicked
 * sort_mapping = {
 *     "${real_data_field_name}": "${sort_value}",
 *     "agent_name": "agent",
 *     ....
 * } // which meant that when column "Agent Name" is clicked, an associate field name
 * is "agent_name" will be referred to and lookup to the value "agent" to send to payload
 * as sort param.
 * - Required attributes for DOM: 
 *   class: "data-table-listing" 
 *   data-type: "data-table" 
 *   data-source: "${data_source_url}" 
 *   data-header-text: "${block_heading_text}" 
 *   data-subheader-text: "" 
 *   data-allow-report: "${allow_report<int: 0 | 1>}" 
 *   data-show-job-listing: "1" 
 *   data-filter-by: "${filter_dom_target} e.g enrollment-listing-filter" 
 *   data-download-filename: ${download_file_name} e.g Enrollment List
 * */
class DataTable extends Base{

    constructor(){ super(); }

    init(selector){

        if("undefined" === typeof selector || null === selector){ return this; }// 

        this.set("el", selector);


        return this.prep();
        
    } // 


    prep(){

        let the_item = this.get("el"), 
            panel_header = null;
        
        the_item.innerHTML = `<div class="inner" data-type='js-container'></div>`;

        the_item.the_filter = null;

        if("undefined" !== typeof the_item.dataset.filterBy){

            the_item.the_filter = document.querySelector(`#${the_item.dataset.filterBy}`);

            if(null !== the_item.the_filter){
                the_item.the_filter.controller = new DataTableFilter();
                the_item.the_filter.controller.init(the_item.the_filter);
                the_item.the_filter.controller.add_hooks("filters-changed", this.handle_filter_changed.bind(this))
            }

        }
        
        panel_header = new PanelHeader();
        panel_header.init().set_title(the_item.dataset.headerText);

        if("undefined" !== typeof the_item.dataset.subHeaderText){
            panel_header.set_sub_title(the_item.dataset.subHeaderText);
        }




        this.get_container().append(panel_header.get_dom());

        the_item.panel_header = panel_header;

        if(1 === parseInt(the_item.dataset.allowDownload || -1)){
            the_item.download = new DataTableDownload();
            the_item.download.init();
            the_item.download.add_hooks("request-download", this.handle_download_request.bind(this));
            the_item.panel_header.get_container().append(the_item.download.get_dom());
        }


        return this
                    .init_worker()
                    .bind_events()
                    .fetch_data();

    } // 


    /*
     * @description: to register for a worker for data fetching
     * @return this;
     * */
    init_worker(){

        let the_worker = new Worker(this.get_asset_url("js/worker.js"));
        return this
                    .set("worker_action", "data-table-fetch")
                    .set("worker", the_worker)
                    .bind_worker_events();

    }





    handle_sort_request(the_data, the_event){

        this.set("sort", the_data.sort);
        this.set("dir", the_data.dir);

        this.reset_paging();
        this.set("reloading_paging", true);

        return this.fetch_data();

    } //


    handle_download_request(the_data, the_event){
        this.set("is_requesting_download", true);
        return this.fetch_data();
    } // handle download request

    handle_filter_changed(the_data, the_event){

        // default sort if filter changed
        this.rm("sort");
        this.rm("dir");

        this.set("reloading_paging", true);
        this.reset_paging();
        this.set("filter_data", the_data.data);
        return this.fetch_data();
    } //

    has_filter(){ return null !== this.get("el").the_filter;}

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

    bind_events(){


        return this;
    } // bind events



    reset_paging(){
        var the_item = this.get("el");

        if("undefined" !== typeof the_item.table){
            the_item.table.tpaging.reset_paging();
        }
        return this;
    }


    setup_table(){

        let the_item = this.get("el"), 
            table = null,
            thead = null, 
            tbody = null, 
            tpaging = null,
            table_wrapper = null;
            

        if("undefined" !== typeof the_item.table) return this;

        table = document.createElement("table");
        thead = new DataTableHeader();
        tbody = document.createElement("tbody");
        tpaging = new DataTablePaging(); 
        table_wrapper = document.createElement("div");

        table_wrapper.classList.add("table-wrapper");
        if(Object.keys(window.keys_mapping || {}).length > 6){
            table_wrapper.classList.add("large-table");
        }

        thead.init(null, this.get("data") ?? null);
        thead.add_hooks("request-sort", this.handle_sort_request.bind(this));

        tpaging.init();

        tpaging.add_hooks("page-changed", this.handle_page_changed.bind(this));

        table.classList.add("table", "table-hover");
        table.append(thead.get_dom());
        table.append(tbody);
        table.append(tpaging.get_dom());


        the_item.table = table;
        the_item.table.thead = thead;
        the_item.table.tbody = tbody;
        the_item.table.tpaging = tpaging;

        table_wrapper.append(the_item.table);
        the_item.table_wrapper = table_wrapper;

        this.get_container().append(table_wrapper);
        this.get_container().append(tpaging.get_dom());


        return this;

    }// prepping table

    handle_page_changed(the_data, the_event){

        this.set("reloading_paging", false);
        return this.fetch_data();
    } 

    handle_data(){

        let the_item    = this.get("el"), 
            the_data    = this.get("data"), 
            the_total   = this.get("total"), 
            the_pape    = this.get("page"), 
            the_limit   = this.get("limit");



        switch(this.get("is_requesting_download") || false){
            case true:
                // if is requesting a report
                if(this.get("is_requesting_a_report") || false){
                    this.done_waiting(this.get_container());
                    this.set("is_requesting_download", false);
                    this.set("is_requesting_a_report", false);
                    this.success("Your request report has been sent. ");
                    // done requsting a report
                }else{
                    this.download_csv_file(null, this.json_to_csv(this.clean_data_for_download()), the_item.dataset.downloadFilename || "download-document");
                    this.done_waiting(this.get_container());
                    this.set("is_requesting_download", false);
                }
                break;
            default:
                this.setup_table();
                this.do_clear(the_item.table.tbody, this.do_display_data.bind(this));
        }

        return this;

    } // handle data

    clean_data_for_download(){

        let the_data = this.get("data"), 
            clean_data = [];
        
        the_data.forEach(s => {
            let the_row = {};
            Object.keys(keys_mapping).forEach(m => {
                the_row[keys_mapping[m]] = s[m];
            });
            clean_data.push(the_row);
        });

        return clean_data;

    } // done cleaning data for download
 
    handle_no_data(){

        let the_item = this.get("el");
		
        if("undefined" === typeof the_item.table){
            return this.do_display_no_data_no_table();
        }
        this.do_clear(this.get("el").table.tbody, this.do_display_no_data.bind(this));
        return this;

    } // handle no data

    do_display_no_data_no_table(){
        let the_item = this.get("el"), 
            _p = document.createElement("p");
        _p.innerHTML = "No records were found.";
        this.get_container().append(_p);
        // if component download exists
        if(the_item.download){ the_item.download.deactivate(); }
        return this;
    }
    do_display_no_data(){

        let t_row = new DataTableRow(), 
            the_item = this.get("el");

        t_row.init().set_empty_row();
        the_item.table.tbody.append(t_row.get_dom());
        the_item.table.tpaging.set_data(0,0);

        // if component download exists
        if(the_item.download){ the_item.download.deactivate(); }

        return this;
    }

    do_display_data(){

        let the_data = this.get("data"), 
            the_item = this.get("el"), 
            is_reloading_paging = this.get("reloading_paging"), 
            url_details = the_item.dataset.urlDetails || null;

        the_data.forEach(s => {
            let t_row = new DataTableRow();
            t_row.init().set_data(s);
            null !== url_details && url_details.length > 0 && t_row.set_link(this.format(url_details, s.id));
            this.get("el").table.tbody.append(t_row.get_dom());
        });


        if(false !== is_reloading_paging){
            the_item.table.tpaging.set_data(this.get("total"),this.get("limit"));
        }

        if(the_item.download){ the_item.download.activate(); }

        this.done_waiting(this.get_container());

        return this;

    }

    /*
     * @description: send http request to fetch data , 
     * if success: call back to done_fetching_data 
     * if failed: call back to failed_fetching_data
     * @return object
     * */
    fetch_data(){

        let the_item = this.get("el"), 
            posting_data  = this.get("filter_data") || {}, 
            the_worker = this.get("worker") ?? null;


        posting_data.input_page = 1;
        posting_data.input_sort = this.get("sort");
        posting_data.input_sort_dir = this.get("dir");

        // if(the_item.download){ the_item.download.deactivate(); }

        if("undefined" !== typeof the_item.table){
            posting_data.input_page = the_item.table.tpaging.get_current_page() || 1;
        }

        if(this.get("is_requesting_download")){
            posting_data.is_downloading = 1;
        }
        if(this.get("is_requesting_a_report")){
            posting_data.is_reporting = 1;
        }

        this.do_waiting(this.get_container());

        // if there is worker, let worker work
        if(null !== the_worker){
            the_worker.postMessage(
                {
                    w_action: this.get("worker_action"), 
                    url: the_item.dataset.source, 
                    body: JSON.stringify(posting_data), 
                    method: "POST"
                }
            )
            return this;
        }

        fetch(the_item.dataset.source, {
            method: "POST", 
            body: JSON.stringify(posting_data)

        }).then(res => res.json())
        .then(the_data => this.done_fetching_data(the_data))
        .catch(error => this.failed_fetching_data(error));

        return this;

    } // fetch data

    /*
     * @description: data catcher when fetch is done and expected data
     * with the following structure
     * {
     *  "data": [], 
     *  "total": int total_records, 
     *  "page": int current_page, 
     *  "limit": int number_of_records_per_page
     * }
     * @return func handle_data()
     * */
    done_fetching_data(the_data){

        if("undefined" === typeof the_data.status || !the_data.status) return this.failed_fetching_data(the_data.error);

        the_data.data ??= [];
        this.set("data", the_data.data ?? []);
        this.set("total", the_data.total ?? the_data.data.length);
        this.set("page", the_data.page ?? 1);
        this.set("limit", the_data.limit ?? the_data.data.length);
        
        this.run_hooks("done_fetching_data");

        return this.handle_data();

    } // done fetching dat

    failed_fetching_data(error){

        this.handle_no_data();
        this.done_waiting(this.get_container());
        this.run_hooks("failed_fetching_data");
        // this.do_display_no_records();
        return this;

    } // failed fetching data

} // data table

export {DataTable}
