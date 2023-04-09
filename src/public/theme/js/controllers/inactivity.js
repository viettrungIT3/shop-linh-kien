(function() {
    // getting all elements
    const els = {
        btn_continue: document.querySelector(".logout-container #btn-continue"),
        btn_logout: document.querySelector(".logout-container #btn-logout"),
        second_count: document.querySelector(".logout-container .seconds-count"),
    }; //

    const params = {
        idle_time: new Date().getTime(),
        time_out: 15 * 60, // 15minutes
        time_check: null,
        second_counter: null,
        logout_count: 90, //seconds
        current_count: 0,
        is_counting: 0,
        current_position: 0,
    }; //
    function init() {
        if ( els.btn_continue !== null &&
            els.btn_continue.length === 0 ||
            els.btn_logout !== null &&
            els.btn_logout.length === 0 ||
            els.second_count !== null &&
            els.second_count.length === 0
        )
            return false;

        document.querySelector("*").addEventListener("mousemove", reset_timer);
        document.querySelector("*").addEventListener("mousedown", reset_timer);
        document.querySelector("*").addEventListener("mouseup", reset_timer);
        document.querySelector("*").addEventListener("click", reset_timer);
        document.querySelector("*").addEventListener("scroll", reset_timer);
        document.querySelector("*").addEventListener("keypress", reset_timer);
        reset_timer();


            if( els.btn_continue !== null ||  els.btn_logout !== null){
                els.btn_continue.addEventListener("click", reset);
                els.btn_logout.addEventListener("click", logout);
            }

    
    } //
    function reset_timer() {
        if (params.is_counting === 1) return false;
        clearTimeout(params.time_check);
        params.time_check = setTimeout(promp_logout, params.time_out * 1000);
    } //

    function hide_logout() {
        document.querySelector("body").classList.remove("show-logout");
    } //
    function reset() {
        stop_counting();
        hide_logout();
        reset_timer();
    } //

    function logout() {
        window.location = "/logout-due-to-inactivity";
    } //

    function promp_logout() {
        document.querySelector("body").classList.add("show-logout");
        start_counting();
        clearTimeout(params.time_check);
    } //

    function start_counting() {
        params.is_counting = 1;
        params.current_count = 0;
        params.second_counter = setInterval(count, 1000);
    } //

    function count() {
        if (params.current_count === params.logout_count) {
            stop_counting();
            hide_logout();
            logout();
            return false;
        }
        if(els.second_count){
            els.second_count.innerHTML = params.logout_count - params.current_count;
            params.current_count++;
        }
        return true;
    } //

    function stop_counting() {
        params.is_counting = 0;
        clearInterval(params.second_counter);
    } //


    init();
})();
