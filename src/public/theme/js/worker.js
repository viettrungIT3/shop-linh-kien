/*
 *  A generic worker to catch request base on action
 * */

const do_fetch = (
    __w_action,
    __url = null, 
    __method = "GET", 
    __headers = null, 
    __body = null
) => {


    fetch(
            __url, 
            {
                method: __method, 
                headers: null === __headers ? {'Content-Type': 'application/json'}: __headers, 
                body: __body
            }
    )
    .then(res => res.json())
    .then(data => {
        postMessage({
            status: true, 
            data: data, 
            w_action: __w_action
        });

    })
    .catch(e => {
        postMessage({
            status: false, 
            e: e, 
            w_action: __w_action
        });
    });

    return this;
};


// sending signal 
self.postMessage("Registered Worker Status: Ready.");

self.addEventListener("message", (e, params) => {

    let the_data = e.data ?? null;
    switch(the_data.w_action){

        /* 
         * action fetch expect the following params
         * url, method, headers, and body
         * */
        case "fetch":
        case "data-table-fetch":
        case "job-listing":
        case "general-fetching":
        case "option-preloader":
            do_fetch(the_data.w_action, the_data.url ?? null, the_data.method ?? "GET", the_data.headers ?? null, the_data.body ?? null);
            break;

        default: 


    } //

});




